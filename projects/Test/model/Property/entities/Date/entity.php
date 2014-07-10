<?
namespace Test\Model\Property\Date;

use Test\Model\Property\Entity as Property;

class Entity extends Property {

	protected $rule = "/.*/";

	public function format($patt) {
		return date($patt, strtotime($this->value));
	}
}
