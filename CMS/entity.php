<?
/**
 * Основной класс системы.
 * Реализован в singletone, так как система у нас всегда одна.
 */
namespace CMS;

use CMS\Project\Manager as ProjectManager;

// Инклюдим абстрактную структуру системы
include_once(__DIR__."/Abstracts/config.php");
include_once(__DIR__."/Abstracts/entity.php");
include_once(__DIR__."/Abstracts/manager.php");
include_once(__DIR__."/Abstracts/error.php");
include_once(__DIR__."/Abstracts/responce.php");

// Инклюдим конфиг
include_once(__DIR__."/config.php");
// Инклюдим класс ошибок
include_once(__DIR__."/error.php");

// Инклюдим интерфейсы системы
include_once(__DIR__."/Interfaces/Validatable.php");

// Инклюдим менеджеры необходимых сущностей
include_once(__DIR__."/Entities/Project/config.php");
include_once(__DIR__."/Entities/Project/manager.php");

// todo перенести CMS\entity и др. в CMS\Entities\

class Entity {
	/**
	 * @var $instance Entity
	 */
	private static $instance = null;

	public $error;

	/**
	 * Хранилище конфига системы
	 *
	 * @var $instance Config
	 */
	public $config;
	public $db;

	// Инструментарий системы
	/**
	 * @var $project ProjectManager
	 */
	public $projects;

	//const ROOT = ROOT;

	private function __construct() {}
	private function __clone() {}

	/**
	 * @param null $rootPath
	 * @param null $configIniFile
	 * @throws Error
	 * @return Entity
	 */
	public static function init($rootPath = null, $configIniFile = null) {
		if (null === self::$instance) {

			if ($rootPath === null) throw new Error(Error::INIT_PARAM_ERROR_ROOT_PATH, "empty");
			define("ROOT_PATH", $rootPath);
			define("ABSTRACTS_PATH", ROOT_PATH."/".Config::CMS_DIR."/".Config::ABSTRACTS_DIR);
			define("LIB_PATH", ROOT_PATH."/".Config::CMS_DIR."/".Config::LIB_DIR);

			self::$instance = new self();
			self::$instance->config = new Config($configIniFile);
			self::$instance->projects = new ProjectManager(self::$instance);

			header("Content-type: text/html; charset=".self::$instance->config->charset);

			include_once self::$instance->config->get("libPath")."/DbSimple/Connect.php";
			self::$instance->db = new \DbSimple_Connect(
				self::$instance->config->get("db_engine")."://".
				self::$instance->config->get("db_user").":".
				self::$instance->config->get("db_pass")."@".
				self::$instance->config->get("db_host")."/".
				self::$instance->config->get("db_database")
			);
		}

		return self::$instance;
	}

	public function save() {}
	public function set($name, $value) {
		$this->$name = $value;
	}

	/**
	 * @return Config
	 */
	public static function config() {
		return self::$instance->config;
	}

	public static function parseIni($filePath) {
		return parse_ini_file($filePath);
	}

	public static function l() {
		@ob_end_flush();
		$args = func_get_args();
		echo "<xmp>[".date("d.m.y H:i:s")."] ";
		foreach($args as $arg) {
			var_export($arg);
			echo "\n";
		}
		echo "</xmp><br />\n\n";
		@ob_start();
	}

	public static function z() {
		@ob_end_flush();
		$args = func_get_args();
		echo "<xmp>[".date("d.m.y H:i:s")."] ";
		foreach($args as $arg) {
			var_export($arg);
			echo "\n";
		}
		echo "</xmp><br />\n\n";
		@ob_start();
	}

	public static function zv() {
		@ob_end_flush();
		$args = func_get_args();
		echo "<xmp>[".date("d.m.y H:i:s")."]</xmp> ";
		foreach($args as $arg) {
			var_dump($arg);
			echo "<br /><br />";
		}
		echo "<br />\n\n";
		@ob_start();
	}

	public static function zp() {
		@ob_end_flush();
		$args = func_get_args();
		echo "<xmp>[".date("d.m.y H:i:s")."] ";
		foreach($args as $arg) {
			print_r($arg);
			echo "\n";
		}
		echo "</xmp><br />\n\n";
		@ob_start();
	}

	public static function p() {
		$args = func_get_args();
		echo "<xmp>[".date("d.m.y H:i:s")."] ";
		foreach($args as $arg) {

			print_r($arg);
			echo "\n";
		}
		echo "</xmp><br />\n\n";
	}
}
