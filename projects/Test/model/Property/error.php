<?php
/**
 * Класс ошибок модели Article
 */
namespace MTK\Model\Property;

use CMS\Project\Model\Error as ModelError;

class Error extends ModelError {
	const VALIDATE_FAIL = 10;

	private $dictionary = array(
		10 => "Ошибка валидации.",
	);

}