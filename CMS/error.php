<?
namespace CMS;

use CMS\Abstracts\Error as ErrorAbstract;

//include_once ABSTRACTS_ROOT."/error.php";

class Error extends ErrorAbstract {
	const CONFIG_NO_CONTENT = "Не передана конфигурация состемы.";
	const CONFIG_NO_REQUIRED = "Отсутствует конфигурационный параметр.";

	const DICTIONARY_NO_FILE = "Не найден словарь ошибок.";

	const PROJECT_NO_RESPONCE = "Не удалось получить результат выполнения.";

	const INIT_PARAM_ERROR_ROOT_PATH = "Ошибка задания корневого каталога системы.";

	const ENTITY_NO_POPULATE = "У данной сущности нельзя вызвать метод populate.";
}