<?
namespace CMS\Project\Block;

use CMS\Entity as CMS;
use CMS\Project\Entity as Project;
use CMS\Abstracts\Entity as EntityAbstract;
use CMS\Project\Model\Error as ModelError;

abstract class Entity extends EntityAbstract {
	
	public $name;
	public $dirname;
	public $path;
	public $url;
	public $page;
	public $manager;
	protected $config;

	protected $mods;
	protected $vars;

	private $html = "";
	private $blocks = [];
	private $techPaths = [];
	private $childsTechPaths = [];

	private static $privateSystemProperties = [
		"dirname",
		"manager",
		"config",
		"db",
	];

	/**
	 *
	 * todo: написать комментарии подобного плана (Project $project) - какие классы в каких переменных
	 *
	 * @param Project $project
	 * @param string $name
	 * @param array $mods
	 * @param array $vars
	 */
	public function __construct(Project $project, $name, $mods = [], $vars = []) {
		$this->config = new Config($name);
		$this->project = $project;
		$this->name = $name;
		$this->dirname = CMS::config()->rootPath."/projects/".$this->project->name."/blocks/main/".$name;
		$this->path = "/projects/".$this->project->name."/blocks/main/".$name;
		$this->mods = $mods;
		$this->vars = $vars;
		$this->manager = $project->blocks;

		foreach($this->config->technologies as $techId=>$techInfo) {
			$this->techPaths[$techId] = array();
			$this->childsTechPaths[$techId] = array();
		}
	}

	// todo: временный метод
	public function getView() {
		return $this->html;
	}

	// todo: продумать лучшую реализацию
	// походу это лишнее и не нужно, есть view=json
	public function getJson() {
		/*
		 * Очень сложное вытягивание из блока его свойств без pivate, зарекурсированных объектов
		 * и конфигов с важными данными, которые нельзя выкидывать на фронт.
		 * todo присмотреться
		 */
		$ref = new \ReflectionClass($this);
		$props = $ref->getProperties(\ReflectionProperty::IS_PUBLIC);
		$return = [];
		foreach($props as $prop) {
			$propName = $prop->getName();
			$return[$propName] = $this->$propName;
		}
		$return["vars"] = $this->vars;
		self::removeRecursion($return);
		$encoded = json_encode($a = array(
			"block" => $return,
			"status" => "ok"
		));
		if ($encoded === false) {
			throw new Error(Error::CONTROLLER_ERROR_JSON_ENCODE, "json_error: ".json_last_error_msg());
		} else {
			return $encoded;
		}
	}

	public static function removeRecursion(&$object, &$stack = []) {
		if ((is_object($object) || is_array($object)) && $object) {
			if (is_object($object)) {
				foreach($object as $varName=>$varVal) {
					if (in_array($varName, self::$privateSystemProperties)) unset($object->$varName);
				}
			}
			if (!in_array($object, $stack, true)) {
				$stack[] = $object;
				foreach ($object as &$subobject) {
					self::removeRecursion($subobject, $stack);
				}
			} else {
				$object = "***RECURSION***";
			}
		}
		return $object;
	}

	public function get($technology) {
		return $this->techPaths[$technology];
	}

	public function getChilds($technology) {
		return $this->childsTechPaths[$technology];
	}

	public function getAll($technology) {
		return array_unique(array_merge(
			$this->techPaths[$technology],
			$this->childsTechPaths[$technology]
		));
	}

	protected abstract function controller();

	public function addBlock($name, $mods = [], $vars = [], $callerPageInfo = null) {
		$block = $this->manager->get($name, $mods, $vars);
		if (!empty($callerPageInfo)) $block->page = $callerPageInfo;
		try {
			$block->make();

			// Если при make вышел косяк, не нужно заполнять его в массив блоков, чтобы не перезатереть такой же блок без ошибки

			// Если мы добавляем несколько одноимённых блоков, превращаем элемент с ключем имени блока в массив, и заполняем его
			// этими блоками
			if (!empty($this->blocks[$name])) {
				if (!is_array($this->blocks[$name])) $this->blocks[$name] = array($this->blocks[$name]);
				$this->blocks[$name][] = $block;
			} else {
				$this->blocks[$name] = $block;
			}
			foreach($this->config->technologies as $techId=>$techInfo) {
				$this->childsTechPaths[$techId] = array_merge(
					$this->childsTechPaths[$techId],
					$block->get($techId)
				);
			}
		} catch(Error $error) {
			throw new Error(Error::CONTROLLER_ERROR, $error->getAll("html"));
		}

		// Собираем у каждого блока список стилей и скриптов всех его детей
		// Эта конструкция рекурсивно доводит все скрипты участвующих блоков снизу вверх

		foreach($this->config->technologies as $techId=>$techInfo) {
			$this->childsTechPaths[$techId] = array_merge(
				$this->childsTechPaths[$techId],
				$block->getChilds($techId)
			);
		}

		return $block;
	}

	public function make() {

		try {
			$controllerVars = $this->controller($this->mods, $this->vars);

			if (!empty($controllerVars)) {
				$this->vars = array_merge($this->vars, $controllerVars);
			}

			foreach($this->config->technologies as $techId=>$techInfo) {
				if (file_exists($this->dirname."/".$techInfo["main_filename"].".".$techInfo["extension"])) $this->techPaths[$techId][] = $this->path."/".$techInfo["main_filename"].".".$techInfo["extension"];
				$techPath = $this->dirname."/".$techInfo["dirname"];
				if (is_dir($techPath)) {
					$techFiles = glob($techPath."/*.".$techInfo["extension"]);
					foreach($techFiles as $k=>$v) {
						$techFiles[$k] = $this->path."/".$techInfo["dirname"]."/".basename($v);
					}
					$this->techPaths[$techId] = array_merge($this->techPaths[$techId], $techFiles);
				}
			}

			if (!empty($this->mods["view"])) {
				if (is_array($this->mods["view"])) {
					$viewMods = join("_", $this->mods["view"]);
				} else {
					$viewMods = $this->mods["view"];
				}
				$viewName = $this->dirname."/views/".$viewMods.".php";
				if (!file_exists($viewName)) throw new Error(Error::VIEW_NOT_FOUND, $viewName);
			} else {
				if (file_exists($this->dirname."/view.php")) $viewName = $this->dirname."/view.php";
				else if (file_exists($this->dirname."/views/default.php")) {
					$viewName = $this->dirname."/views/default.php";
				} else {
					throw new Error(Error::VIEW_NOT_FOUND, $this->dirname."/view.php | ".$this->dirname."/views/default.php");
				}
			}
			ob_start();
			include($viewName);
			$html = ob_get_contents();
			ob_end_clean();

			$this->html = $html;
		} catch(Error $error) {
			$this->html = $error->getAll("html");
			throw new Error(Error::CONTROLLER_ERROR, $this->name, $error);
		} catch(ModelError $error) {
			$this->html = $error->getAll("html");
			throw new Error(Error::CONTROLLER_ERROR, $this->name, $error);
		}
	}

	public function render() {
		// todo: здесь должно быть построение html блока независимо от того, куда он потом пойдет
	}

	/**
	 * Заполняет свойства блока.
	 *
	 * @param array $props
	 * @return bool true
	 */
	public function populate($props)	{
		foreach($props as $name=>$value) {
			$this->$name = $value;
		}

		return true;
	}
}
