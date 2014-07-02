<?
namespace CMS\Project;

use CMS\Error as CMSError;

class Error extends CMSError {
	const DOMAIN_NOT_FOUND = "Для домена не найден проект.";
	const DOMAIN_AMBIGUOUS = "Для домена найдено несколько проектов.";

	const BAD_BLOCKS_PATH = "Неверный путь к папке блоков.";
	const ROUTE_NOT_FOUND = "Не найден маршрут.";

	const RESPONCE_STATUS_UNKNOWN = "Неизвестный статус ответа.";

	const CONFIG_FILE_NOT_FOUND = "Не найден конфигурационный файл.";

	const ERROR_CLASS_NOT_FOUND = "Не найден класс ошибок.";
}