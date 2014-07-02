<?
namespace CMS\Project\Block;

use CMS\Project\Error as ProjectError;

class Error extends ProjectError {
	const DIRS_WRONG_STRUCTURE = "Неверная структура папок в папке блоков.";
	const VIEW_NOT_FOUND = "Не найден подходящий view.";

	const CONTROLLER_ERROR = "Ошибка в работе контроллера блока.";

	const TECHNOLOGY_NOT_FOUND = "Указанная технология не найдена.";
	const CONTROLLER_ERROR_JSON_ENCODE = "Ошибка преобразования ответа блока в JSON.";
}