<?
namespace MTK\Model\Property\Date;

use MTK\Model\Property\Entity as Property;

class Entity extends Property {

	protected $rule = "/.*/";

	public function format($patt) {
		return date($patt, strtotime($this->value));
	}
}
