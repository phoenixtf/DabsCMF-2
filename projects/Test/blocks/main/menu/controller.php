<?
namespace MTK\Blocks;

use CMS\Project\Block\Entity as Block;
use CMS\Project\Block\Error as Error;

class menu extends Block {

	public function controller() {

		$error = new Error();
		if (1) {
			$error->add("Меню заблокировано");
			throw $error;
		}
		$items = $this->getItems();
		return array(
			"items" => $items,
		);
	}

	private function getItems() {
		return array(
			array(
				"url" => "/",
				"title" => "Главная",
			),
			array(
				"url" => "/contacts/",
				"title" => "Контакты",
			),
		);
	}
	
}
