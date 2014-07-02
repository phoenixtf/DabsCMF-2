<?
namespace CMS\Project;

use CMS\Entity as CMS;
use CMS\Abstracts\Manager as ManagerAbstract;
use CMS\Project\Entity as Project;

// Инклюдим класс ошибок
include_once(__DIR__."/error.php");

// Инклюдим класс сущности
include_once(__DIR__."/entity.php");

// Инклюдим класс конфига
include_once(__DIR__."/config.php");

// Инклюдим класс ответа
include_once(__DIR__."/responce.php");

// Инклюдим менеджеры необходимых сущностей
include_once(__DIR__."/Model/manager.php");
include_once(__DIR__."/Block/manager.php");

class Manager extends ManagerAbstract {

	private $projects = array();

	final public function __construct(CMS $CMS) {
		$this->cms = $CMS;
		$this->config = new Config();
		$this->projects = $this->config->projects;
	}

	/**
	 * @param mixed $domain
	 * @throws Error
	 * @return Project
	 */
	final public function get($domain) {
		$error = new Error();
		$projects = array();
		foreach ($this->projects as $project=>$domains) {
			if (in_array($domain, $domains)) {
				$projects[] = $project;
			}
		}
		if (empty($projects)) {
			$error->add(Error::DOMAIN_NOT_FOUND, $domain);
			throw $error;
		}
		if (count($projects) > 1) {
			$error->add(Error::DOMAIN_AMBIGUOUS, $domain);
			throw $error;
		}
		$projectName = reset($projects);

		include_once(CMS::config()->get("rootPath")."/".$this->config->dirNameProject."/".$projectName."/entity.php");
		$class = "\\$projectName\\Entity";
		$project = new $class($projectName, $domain);
		$project->manager = $this;
		return $project;
	}

	final public function getAll($domains = array(), $params = array()) {
		// todo дописать метод
		return array();
	}

}
