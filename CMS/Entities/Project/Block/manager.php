<?
namespace CMS\Project\Block;

use CMS\Abstracts\Manager as ManagerAbstract;
use CMS\Project\Entity as Project;
use CMS\Project\Error as ProjectError;

// Инклюдим класс ошибок
include_once(dirname(__FILE__)."/error.php");

// Инклюдим класс конфига
include_once(dirname(__FILE__)."/config.php");

// Инклюдим класс сущности
include_once(dirname(__FILE__)."/entity.php");

class Manager extends ManagerAbstract {

	public $project;
	public $rootDir;

	public $css = array();
	public $js = array();

	const DIR_NAME_FORCED = "forced";
	const DIR_NAME_BLOCKS = "blocks";
	const CONTROLLER_FILE = "controller.php";

	/**
	 *
	 * todo: вместо $project - $context ??
	 * Вопрос - всегда ли сущность точно знает, какой родитель её вызовет?
	 * С одной стороны - нет, потому что services могут быть и у пользователя, и у объекта.
	 * С другой стороны - да, потому что для объекта и для пользователя мы создаём отдельные сущности (здесь и
	 * вырисовывается смысл), которые мы расширяем от более абстрактных, и которые уже точно знают,
	 * кому будут принадлежать.
	 * Это говорит о том, что у них всегда нужно будет перегружать конструктор, и вопрос - а мы так делаем,
	 * нам это будет удобно? Короче todo: рассмотреть конкретные примеры.
	 *
	 * @param Project $project Экземпляр сайта, в рамках которого будет работать менеджер
	 */
	public function __construct(Project $project) {
		$this->project = $project;
		$this->rootDir = $project->config->projectsPath."/".$project->name."/".self::DIR_NAME_BLOCKS;
		$this->url = "/".$project->domain."/".self::DIR_NAME_BLOCKS;
	}

	/**
	 * @param mixed $name
	 * @param array $mods
	 * @param array $vars
	 * @throws Error
	 * @throws ProjectError
	 * @return Entity
	 */
	public function get($name, $mods = array(), $vars = array()) {

		/*
		 * Папка main и уровень, на котором она лежит - просто прослойка над блоками для возможности раскидать блоки
		 * по разным папкам
		 */

		if (file_exists($this->rootDir."/".self::DIR_NAME_FORCED."/".$name."/".self::CONTROLLER_FILE)) {
			include_once($this->rootDir."/".self::DIR_NAME_FORCED."/".$name."/".self::CONTROLLER_FILE);
		} else {
			if (!is_dir($this->rootDir)) throw new ProjectError(ProjectError::BAD_BLOCKS_PATH, $this->rootDir);
			$dirs = array_diff(scandir($this->rootDir), array('..', '.'));
			if (empty($dirs)) throw new Error(Error::DIRS_WRONG_STRUCTURE, $this->rootDir);
			foreach($dirs as $dir) {
				if (file_exists($this->rootDir."/".$dir."/".$name."/".self::CONTROLLER_FILE)) {
					include_once($this->rootDir."/".$dir."/".$name."/".self::CONTROLLER_FILE);
					break;
				}
			}
		}
		$class = "\\".$this->project->name."\\Blocks\\".$name;
		$block = new $class($this->project, $name, $mods, $vars);


/*		// перенести в конструктор блока
		$path = substr($info["dirname"], strlen($this->dirname));
		$block->dirname = $info["dirname"];
		$block->url = $this->url.$path;*/

		$block->manager = $this;
		return $block;
	}

	public function add($name, $mods = array(), $vars = array()) {

	}

	/**
	 * Получает экземпляр соответствующей множеству сущности.
	 *
	 * @param array $ids идентификаторы сущностей
	 * @param array $params параметры, управляющие выборкой сущностей
	 * @return array выбранные сущности
	 */
	public function getAll($ids = array(), $params = array())
	{
		// TODO: Implement getAll() method.
	}
}