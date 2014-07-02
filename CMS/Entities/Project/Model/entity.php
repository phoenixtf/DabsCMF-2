<?
namespace CMS\Project\Model;

use CMS\Abstracts\Entity as EntityAbstract;
//use CMS\Project\Model\Property\Entity as Property;
//use CMS\Project\Model\Property\Error as PropertyError;

abstract class Entity extends EntityAbstract{
	protected $errors; // менеджер ошибок
	public $props; // менеджер свойств
	/**
	 * @var Manager
	 */
	public $manager; // менеджер
	/**
	 * @var array набор подсущностей текущей сущности
	 */
	protected $subClasses = array();

	final public function __construct($props, Manager $manager) {
		$this->errors = new Error();

		$this->manager = $manager;

		//$this->populate($props);
		$curPath = _class_get($this, "dirname");
		$curNamespace = _class_get($this, "namespace");

		$this->subClasses = array();
		$curPathElements = scandir($curPath);
		foreach ($curPathElements as $curPathElement) {
			if ($curPathElement === '.' or $curPathElement === '..') continue;
			// способ исключить пвпку из подключения
			if (strpos($curPathElement, "_") === 0) continue;
			if (is_dir($curPath."/".$curPathElement)) $this->subClasses[] = $curPathElement;
		}

		if (!empty($this->subClasses)) {
			foreach($this->subClasses as $className) {
				$isManager = false;
				if (is_dir($curPath."/".$className)) {
					if (file_exists($curPath."/".$className."/manager.php")) {
						include_once $curPath."/".$className."/manager.php";
						$isManager = true;
					} else {
						include_once $curPath."/".$className."/entity.php";
					}
				} else {
					if (file_exists($curPath."/entities/".$className."/entity.php")) {
						include_once $curPath."/entities/".$className."/entity.php";
					} else {
						l("not included: ".$curPath."/entities/".$className);
					}
				}

				$classNameFull = $curNamespace."\\".$className."\\".($isManager?"Manager":"Entity");
				if ($isManager) {
					// Инициализируем Manager
					$propName = mb_strtolower($className); // todo-think пока так
					$this->$propName = new $classNameFull($this->manager->project, $props);
				} else {
					// Инициализируем Entity
					$dataKey = $classNameFull::field;
					if (!isset($props[$dataKey])) $props[$dataKey] = 'no such prop value for child';
					$this->$propName = new $classNameFull($props[$dataKey], $this->manager);
					unset($props[$dataKey]);
				}
			}
		}

		foreach($props as $propName=>$propValue) {
			$this->$propName = $propValue;
			//$this->set($propName, $propValue);
			// т.к. set есть у каждой Model\Entity, лучше использовать его
		}

		if (is_callable(array($this, "_init"))) {
			$this->_init();
			// todo-think здесь есть вопрос по параметрам, как их передавать, и нужно ли
		}
	}

	/*
	 *	Пробегает по всем свойствам экземпляра и, если они являются инстанциями класса Property, запускаем их валидацию
	 *
	 */
	public function validate() {
		try {
			foreach ($this as $name=>$value) {
				if ($value instanceof Property) {
					$this->$name->validate();
				}
			}
		} catch (PropertyError $error) {
			throw new Error(Error::PROPERTY_VALIDATION_ERROR, $this, $error);
			// todo проверить, можно ли передавать this в контекст
		}
	}

	public function _init() {

	}

	/**
	 * Выполняет необходимые операции по сохранению текущего состояния сущности.
	 */
	public abstract function save();

	/**
	 * Устанавливает свойство сущности.
	 *
	 * @param $name
	 * @param $value
	 * @return true
	 */
	public function set($name, $value) {
		$this->$name = $value;
	}

	public function error($errorId) {
		$error = $this->errors->add($errorId);
		return $error;
	}

	public function isError() {
		return empty($this->errors);
	}

	protected function populate($props) {
		if (is_array($props)) {
			$thisClassName = get_class($this);
			$thisNamespace = str_replace("\\Entity", "", $thisClassName);
			$className = $thisNamespace."\\Property\\Manager";
			$this->props = new $className($props);
		}
	}

	/**
	 * @param $name
	 * return PropertyManager
	 */
	public function prop($name) {
		return $this->props->$name->get();
	}
}

