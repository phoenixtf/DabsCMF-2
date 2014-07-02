<?
namespace CMS\Project\Block;

use CMS\Abstracts\Config as ConfigAbstract;

class Config extends ConfigAbstract {

	public $technologies = [
		"css" => [
			"main_filename" => "style",
			"extension" => "css",
			"dirname" => "css",
			"webpath" => true,
			// "filepath" => true если нужен полный путь к файлу
		],
		"js" => [
			"main_filename" => "script",
			"extension" => "js",
			"dirname" => "js",
			"webpath" => true
		]
	];

	public function __get($name) {
		throw new Error(Error::CONFIG_NO_FIELD, $name);
	}
}