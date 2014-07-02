<?
namespace CMS\Project;

use CMS\Abstracts\Config as ConfigAbstract;
use CMS\Entity as CMS;

class Config extends ConfigAbstract {
	public $dirNameProject = "projects";
	public $projectsPath;
	
	public $projects = array(
		"Test" => array(
			"cms-dev.loc",
		),
	);
	
	function __construct() {
		$this->set("projectsPath", CMS::config()->get("ROOT_PATH")."/".$this->dirNameProject);
	}

	public function __get($name) {
		throw new Error(Error::CONFIG_NO_FIELD, $name);
	}
}