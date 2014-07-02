<?
namespace CMS\Project\Model;

use CMS\Project\Error as ProjectError;

class Error extends ProjectError {
	// Ошибки свойств
	const PROPERTY_ERROR = 100;
	const PROPERTY_SET_ERROR = 110;
	const PROPERTY_GET_ERROR = 120;

	const PROPERTY_VALIDATION_ERROR = 130;

	// Ошибки БД
	const DB_ERROR = 400;

	protected $dictionary = array(
		100 => "Ошибка свойства модели.",
		110 => "Ошибка установки свойства модели.",
		120 => "Ошибка получения свойства модели.",
		130 => "Ошибка валидации одного из свойств.",
		400 => "Ошибка базы данных."
	);
}