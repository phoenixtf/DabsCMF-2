<?
namespace CMS\Abstracts;

/**
 * Абстрактный класс для реализации менеджера множества сущностей.
 */
abstract class Manager {
	/**
	 * Возвращает экземпляр соответствующей множеству сущности.
	 *
	 * @param mixed $id однозначный идентификатор сущности среди подобных
	 * @return object сущность
	 */
	public abstract function get($id);

	/**
	 * Возвращает множество сущностей.
	 *
	 * @param array $ids идентификаторы сущностей
	 * @param array $params параметры, управляющие выборкой сущностей
	 * @return array выбранные сущности
	 */
	public abstract function getAll($ids = array(), $params = array());

}