<?

namespace Test\Model\Article;

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

	/**
	 * Меняет определённый параметр
	 *
	 * @param $name
	 * @param $value
	 * @throws ModelError
	 * @return true
	 */
	public function set($name, $value)
	{
		try {
			$this->validateReg($name, $value);
		} catch(Error $e) {
			throw new ModelError(ModelError::PROPERTY_SET_ERROR, $name.", ".$value, $e);
		}
	}

	public function validateReg($name, $value) {
		if (!empty($this->valid[$name])) {
			if (preg_match($this->valid[$name], $value, $match)) {
				return true;
			} else {
				throw new Error(Error::PARAM_BAD_FORMAT, $name);
			}
		} else {
			throw new Error(Error::PARAM_NOT_FOUND, $name);
		}
	}

	public function updateView($time) {
		try {
			//$this->validateReg("view", $time);
		} catch(Error $e) {

			// здесь можно поглотить ошибку, если её можно исправить внутри модели

			// если ошибку поглотить не удалось, кидаем её дальше
			throw $e;
		}

		// тут должен быть ещё апдейт БД

	}
}