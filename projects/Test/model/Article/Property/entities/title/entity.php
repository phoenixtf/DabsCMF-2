<?
namespace MTK\Model\Article\Property\title;

use MTK\Model\Property\String\Entity as StringProperty;

class Entity extends StringProperty {
	static $field = "title";

	function cut($to = 32, $end = "...") {
		return trim(mb_substr($this->value, 0, $to, "utf-8")).$end;
	}

}