<?
namespace Test\Model\Article\Property;

use Test\Model\Property\Manager as PropertyManager;

include_once __DIR__."/../../Property/manager.php";
include_once __DIR__."/entities/content/entity.php";
include_once __DIR__."/entities/date/entity.php";
include_once __DIR__."/entities/title/entity.php";

class Manager extends PropertyManager {

	const DIR = __DIR__;

	public $id = "id";
	public $title = "title";
	public $content = "content";
	public $date = "date-published";

}