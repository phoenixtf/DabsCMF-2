<?
namespace CMS\Project\Model;

use CMS\Abstracts\Config as ConfigAbstract;
use CMS\Entity as CMS;

class Config extends ConfigAbstract {
	public function __get($name) {
		throw new Error(Error::CONFIG_NO_FIELD, $name);
	}
}