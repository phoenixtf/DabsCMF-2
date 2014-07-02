<?

namespace MTK\Model\Article;

use CMS\Project\Model\Error as ModelError;

class Error extends ModelError {
	const PARAM_BAD_FORMAT = 10;
	const PARAM1_BAD_FORMAT = 20;
	const PARAM2_BAD_FORMAT = 30;
	const PARAM_NOT_FOUND = 40;
	const VIEW_BAD_FORMAT = 50;
	const GET_NO_RESULT = 100;

	protected $dictionary = array(
		10 => "Неверный формат параметра.",
		20 => "Неверный формат параметра 1.",
		30 => "Неверный формат параметра 2.",
		40 => "Параметр не найден.",
		50 => "Неверный формат даты.",
		100 => "Не найдены объекты по заданным параметрам."
	);

}