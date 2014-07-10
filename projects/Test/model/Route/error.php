<?
namespace Test\Model\Route;

use Test\Model\Error as ModelError;

class Error extends ModelError {
	const UNKNOWN = 1000;

	protected $dictionary = array(
		1000 => "Неизвестная ошибка.",
	);

}