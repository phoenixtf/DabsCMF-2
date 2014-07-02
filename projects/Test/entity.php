<?
namespace Test;

use CMS\Project\Entity as ProjectEntity;
use CMS\Error as CMSError;

//include_once __DIR__."/model/config.php";

class Entity extends ProjectEntity {

	public function populate($props) {
		throw new CMSError(CMSError::ENTITY_NO_POPULATE, get_class($this));
	}
}