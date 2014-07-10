<?
namespace Test\Model\Property;

use CMS\Project\Model\Entity as ModelEntity;
use CMS\Error as CMSError;

class Entity extends ModelEntity {

	public function save() {
		$this->validate();
		// todo ??
	}

	protected $rule = null;
	public $value;

	public function set($name, $value = null)
	{
		if (empty($value)) {
			$value = $name;
			$name = "value";
		}
		$this->$name = $value;
		$this->validate();
	}

	public function validate() {
		if (empty($this->rule) || preg_match($this->rule, $this->value)){
			return true;
		} else {
			throw new Error(Error::VALIDATE_FAIL);
		}
	}

	public function get() {
		return $this->value;
	}

	public function populate($props) {
		throw new CMSError(CMSError::ENTITY_NO_POPULATE, get_class($this));
	}
}