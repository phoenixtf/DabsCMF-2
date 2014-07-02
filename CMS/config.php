<?
namespace CMS;

use CMS\Entity as CMS;
use CMS\Abstracts\Config as ConfigAbstract;

class Config extends ConfigAbstract {

	const CONFIG_FILE_NAME = "config.ini";

	const CMS_DIR = "CMS";
	const ABSTRACTS_DIR = "Abstracts";
	const LIB_DIR = "Library";
	const PROJECTS_DIR = "projects";
	const ROOT_PATH = ROOT_PATH;
	const ABSTRACTS_PATH = ABSTRACTS_PATH;
	const LIB_PATH = LIB_PATH;

	public $rootPath = ROOT_PATH;
	public $libPath = LIB_PATH;

	// Список необходимых системе настроек
	private $required = array(
		"db_engine",
		"db_host",
		"db_user",
		"db_pass",
		"db_database",
		"db_prefix",
	);

	final public function __construct($configIniFile = null) {
		if ($configIniFile !== null) {
			$config = CMS::parseIni($configIniFile);
			foreach($config as $param=>$value) {
				$this->set($param, $value);
			}
		}

		// Переданы ли все необходимые параметры системы
		foreach($this->required as $parameter) {
			if (!isset($this->$parameter)) throw new Error(Error::CONFIG_NO_REQUIRED, $parameter);
		}
	}

	public function __get($name) {
		throw new Error(Error::CONFIG_NO_FIELD);
	}
}

