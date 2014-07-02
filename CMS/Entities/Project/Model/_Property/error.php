<?php
/**
 * Класс ошибок модели Article
 */
namespace CMS\Project\Model\Property;

use CMS\Project\Model\Error as ModelError;

class Error extends ModelError {
	const VALIDATE_FAIL = 10;

	protected $dictionary = array(
		10 => "Ошибка валидации.",
	);

}