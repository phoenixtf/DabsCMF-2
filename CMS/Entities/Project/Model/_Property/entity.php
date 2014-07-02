<?
namespace CMS\Project\Model\Property;

use CMS\Abstracts\Entity as EntityAbstract;
use CMS\Error as CMSError;

class Entity extends EntityAbstract {

	protected $rule = null;
	public $value;

	final function __construct($value) {
		$this->set($value);
	}

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