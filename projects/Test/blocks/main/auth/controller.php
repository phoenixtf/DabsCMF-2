<?
namespace MTK\Blocks;

use CMS\Project\Block\Entity as Block;
use MTK\Model\Fuser\Error as FuserError;
use MTK\Model\Phone\Error as PhoneError;

class auth extends Block {

	public function controller($mods = array(), $vars = array()) {
		$fuser = null;
		$errors = null;
		if ((!empty($vars["phone"]) || !empty($vars["mail"])) && !empty($vars["password"])) {
			$fusers = $this->project->initModel("Fuser");
			try {
				$fuser = $fusers->getByAuth(
					empty($vars["phone"])?null:$vars["phone"],
					$vars["password"],
					empty($vars["mail"])?null:$vars["mail"]
				);
			} catch(FuserError $e) {
				$errors = $e->getAll("text");
			} catch(PhoneError $e) {
				$errors = $e->getAll("text");
			}
		}
		return array(
			"fuser" => $fuser,
			"errors" => $errors,
			"type" => empty($mods["type"])?null:$mods["type"]
		);
	}

}
