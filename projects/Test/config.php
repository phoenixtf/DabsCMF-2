<?
namespace Test;

use CMS\Entity as CMS;
use CMS\Project\Config as ProjectConfig;

class Config extends ProjectConfig {

	protected $rootPath;
	protected $modelRootPath;
	protected $blocksRootPath;

	function __construct(){
		parent::__construct();

		$this->set("rootPath", CMS::config()->get("ROOT_PATH")."/".$this->dirNameProject."/");
		$this->iniFile(__DIR__."/config.ini");
		// todo скрыть конфиг из выводов, если возможно
	}
}