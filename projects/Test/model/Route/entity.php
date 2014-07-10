<?
namespace Test\Model\Route;

use CMS\Project\Model\Entity as ModelEntity;
use CMS\Project\Model\Error as ModelError;

class Entity extends ModelEntity {

	/**
	 * Выполняет необходимые операции по сохранению текущего состояния сущности.
	 *
	 * @throws ModelError
	 * @return ModelError в случае ошибки
	 */
	public function save()
	{
		if (false) throw new ModelError("Ошибка сохранения.");
	}


}