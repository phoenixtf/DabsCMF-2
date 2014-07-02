<?php
/**
 * Класс абстрактного конфига
 *
 * Конфиг лежит только в менеджере, в сущности есть свойство manager с экземпляром, откуда можно запроситься к конфигу
 */

namespace CMS\Abstracts;

abstract class Config {

	/**
	 * @param string $name имя свойства конфига
	 * @return mixed
	 */
	public function get($name) {
		$class = get_called_class();
		if (defined($class."::".$name)) return constant($class."::".$name);
		else return (isset($this->$name))?$this->$name:null;
	}

	/**
	 * @param string $name имя свойства конфига
	 * @param mixed $value содержимое свойства конфига
	 * @return bool true
	 */
	protected function set($name, $value) {
		$this->$name = $value;
		return true;
	}

	/**
	 * Должны быть описаны магические методы, обрабатывающие обращения к несуществующим свойствам конфига
	 *
	 * @param $name
	 * @return mixed
	 */
	abstract function __get($name);

	/**
	 * Функция для обработки ini-файла конфигурации.
	 *
	 * @param string $path путь к файлу
	 * @return bool true
	 */
	protected function iniFile($path) {

		if (file_exists($path)) {
			$props = parse_ini_file($path);
			foreach($props as $name=>$value) {
				$this->$name = $value;
			}
		}

		return true;
	}
}