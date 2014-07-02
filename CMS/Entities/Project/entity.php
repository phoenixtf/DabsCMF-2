<?
namespace CMS\Project;

use CMS\Abstracts\Entity as EntityAbstract;
use CMS\Project\Block\Manager as BlockManager;
use CMS\Entity as CMS;

abstract class Entity extends EntityAbstract {

	public $manager;
	public $domain;
	public $name;
	/**
	 * @var BlockManager
	 */
	public $blocks;
	/**
	 * @var Config
	 */
	public $config;
	public $path;
	protected $routes;

	public function __construct($name, $domain) {

		$this->cms = CMS::init();
		$this->set("name", $name);
		$this->set("domain", $domain);
		$this->set("path",
			$this->cms->config->get("PROJECTS_DIR")."/".
			$this->name
		);
		$this->set("modelPath",
			$this->cms->config->get("PROJECTS_DIR")."/".
			$this->name."/".
			$this->cms->config->get("MODEL_DIR")
		);

		if (!file_exists($this->path."/config.php")) {
			throw new Error(Error::CONFIG_FILE_NOT_FOUND, $this->path."/config.php");
		}
		include_once $this->path."/config.php";
		$projectConfigClass = $this->name."\\Config";
		$this->config = new $projectConfigClass();
		if (!file_exists($this->path."/error.php")) {
			throw new Error(Error::ERROR_CLASS_NOT_FOUND, $this->path."/error.php");
		}

		include_once CMS::config()->libPath."/DbSimple/Connect.php";
		if (
			!empty($this->config->get("db_user"))
		) {
			//$this->db->setLogger('queryLogger');
			//$this->db->setErrorHandler('DbSimpleErrorHandler');
			$this->db = new \DbSimple_Connect(
				$this->config->get("db_engine")."://".
				$this->config->get("db_user").":".
				$this->config->get("db_pass")."@".
				$this->config->get("db_host")."/".
				$this->config->get("db_database")
			);

			$this->db->setIdentPrefix($this->config->get("db_prefix"));

		} else {
			$this->db = CMS::init()->db;
		}

		$this->blocks = new BlockManager($this);
	}

	public function render($url, $query = array()) {
		try {
			$error = new Error();
			$routeInfo = $this->route($url);
			$blockName = $routeInfo["block"];
			if (empty($blockName)) {
				$error->add(Error::ROUTE_NOT_FOUND, $url);
				throw $error;
			}
			// Отправляем в блок данные о разборе URL
			$query["route_info"] = $routeInfo;
			$parentBlockName = $routeInfo["block-parent"];
			$mods = !empty($query["mods"])?$query["mods"]:[];
			if (!empty($parentBlockName)) {
				$mods = array_merge($mods, array(
					"caller" => "route",
					"child-block" => $blockName
				));
				$block = $this->blocks->get(
					$parentBlockName,
					$mods,
					$query
				);
				$block->page = $routeInfo["section"];
				$mods = array_merge($mods, array(
					"caller" => "block-parent",
					"block-parent" => $parentBlockName
				));
				$block->addBlock(
					$blockName,
					$mods,
					$query,
					$routeInfo["section"]
				);
				$block->make();

			} else {
				$mods = array_merge($mods, array(
					"caller" => "route"
				));
				$block = $this->blocks->get(
					$blockName,
					$mods,
					$query
				);
				$block->page = $routeInfo["section"];
				$block->make();
			}

			if (!empty($query["mods"]["view"]) && in_array("ajax", $query["mods"]["view"])) {
				$result = new Responce(Responce::STATUS_OK, Responce::TYPE_JSON, $block->getJson());
			} else {
				$result =  new Responce(Responce::STATUS_OK, Responce::TYPE_HTML, $block->getView());
			}
		} catch(Error $error) {
			// todo-talk заценить способ определения рода ошибки
			if ($error->has($error::ROUTE_NOT_FOUND)) {
				// todo умолчательный блок для вывода 404 страницы
				$result = new Responce(Responce::STATUS_ERROR_NOT_FOUND, Responce::TYPE_HTML, $error->getAll("html"));
			} else {
				$result = new Responce(Responce::STATUS_ERROR_SYSTEM, Responce::TYPE_HTML, $error->getAll("html"));
			}
		}

		return $result;
	}

	private function route($url) {
		$sections = explode("/", trim($url, '/'));
		$sectionsInfo = array();
		if (count($sections) == 1 && empty($sections[0])) $sections[0] = "index"; // главная страница
		if (strpos($sections[0], "block.") === 0) {
			$controllerSection = [];
			$controllerSection["block"] = str_replace("block.", "", $sections[0]);
			$controllerSection["block-parent"] = null;
		} else {
			foreach($sections as $section) {
				if (empty($sectionInfo)) $parentId = null;
				else $parentId = $sectionInfo["id"];
				$sectionInfo = $this->db->selectRow("
SELECT
	`id`, `parent-id`, `name`, `block`, `block-parent`, `content`
FROM
	?__route
WHERE
	`name` = ?
AND
	{`parent-id` = ?d}
	{`parent-id` IS ?}
LIMIT 1
			",
					$section,
					is_null($parentId)?DBSIMPLE_SKIP:$parentId,
					!is_null($parentId)?DBSIMPLE_SKIP:$parentId
				);
				if (!empty($sectionInfo)) $sectionsInfo[] = $sectionInfo;
			}

			$sectionsInfoReverse = array_reverse($sectionsInfo);
			$controllerSection = null;
			foreach($sectionsInfoReverse as $sectionInfo) {
				if (!empty($sectionInfo["block"])) {
					$controllerSection = $sectionInfo;
					break;
				}
			}
		}
		return [
			"block" => $controllerSection["block"],
			"block-parent" => $controllerSection["block-parent"],
			"section" => $controllerSection,
			"sections" => $sectionsInfo
		];
	}

	/**
	 * Выполняет необходимые операции по сохранению текущего состояния сущности.
	 *
	 * @return Error в случае ошибки
	 */
	public function save()
	{
		// TODO: Implement save() method.
	}

	/**
	 * Меняет определённый параметр
	 *
	 * @param $name
	 * @param $value
	 * @return true
	 */
	public function set($name, $value)
	{
		$this->$name = $value;
	}

	/**
	 * todo-talk ок не ок, сделано только для того, чтобы инклюд тоже не писать в блоке
	 * но такая штука ещё позволяет неявно передать модели проект, а там БД и прочие ништяки
	 *
	 * @param string $name имя модели
	 * @return object
	 */
	public function initModel($name) {
		include_once
			$this->path."/model/".$name."/manager.php";
		$managerClassName = $this->name."\\Model\\".$name."\\Manager";
		$managerClass = new $managerClassName($this);
		return $managerClass;
	}
}
