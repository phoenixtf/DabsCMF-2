<?
namespace CMS\Project\Model\Property;

use CMS\Abstracts\Manager as ManagerAbstract;

include_once __DIR__."/entity.php";
include_once __DIR__."/error.php";

class Manager extends ManagerAbstract {

	//protected $propAliases = array();

	final function __construct() {
		/*foreach($props as $name=>$value) {
			$thisClassName = get_class($this);
			$thisNamespace = str_replace("\\Manager", "", $thisClassName);
			// todo-think вариант с хранением алиасов прямо в свойствах, с явным их заданием
			$curProps = get_object_vars($this);
			foreach($curProps as $propName=>$propVal) {
				if ($propVal == $name) {
					$reflection = new \ReflectionClass($this);
					$dir = dirname($reflection->getFileName());
					$classPath = $dir."/entities/".$propName."/entity.php";
					if (file_exists($classPath)) {
						include_once $classPath;
						$className = $thisNamespace."\\".$propName."\\Entity";
						$this->$propName = new $className($value);
					} else {
						//$className = "Entity";
						$this->$propName = new Entity($value);
						// todo-think здесь, я думаю, и нужно сделать наследование
						// свойств от блоков более высокого порядка,
						// и только если совсем уж не нашлось, использовать нативный класс
					}
				}
			}
		}*/
	}

	/**
	 * Возвращает экземпляр соответствующей множеству сущности.
	 *
	 * @param mixed $id однозначный идентификатор сущности среди подобных
	 * @return object сущность
	 */
	public function get($id)
	{
		// TODO: Implement get() method.
	}

	/**
	 * Возвращает множество сущностей.
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