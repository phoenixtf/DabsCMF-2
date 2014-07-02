<?
namespace MTK\Model\Property;

use CMS\Project\Model\Manager as PropertyManager;

include_once __DIR__."/entity.php";
include_once __DIR__."/entities/Integer/entity.php";
include_once __DIR__."/entities/String/entity.php";
include_once __DIR__."/entities/Date/entity.php";

class Manager extends PropertyManager {

	public $childs = array(
		"bool" => "Bool",
		"string" => "String"
	);

	/**
	 * Возвращает экземпляр соответствующей множеству сущности.
	 *
	 * @param mixed $name имя свойства
	 * @return object объект свойства
	 */
	public function get($name)
	{
		include_once(_class_get($this, "dirname"))."/entities/".$name."/entity.php";
		$classname = _class_get($this, "namespace")."\\".$name."\\Entity";
		return new $classname(array("value" => $this->data[$name]), $this);
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