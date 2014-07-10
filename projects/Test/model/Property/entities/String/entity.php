<?
namespace Test\Model\Property\String;

use Test\Model\Property\Entity as Property;

class Entity extends Property {

	protected $rule = "/.*/";

	function cut($to = 32, $end = "...") {
		return trim(mb_substr($this->value, 0, $to, "utf-8")).$end;
	}
}
