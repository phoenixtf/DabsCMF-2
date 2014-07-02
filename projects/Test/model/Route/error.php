<?
namespace MTK\Model\Route;

use MTK\Model\Error as ModelError;

class Error extends ModelError {
	const UNKNOWN = 1000;

	protected $dictionary = array(
		1000 => "Неизвестная ошибка.",
	);

}