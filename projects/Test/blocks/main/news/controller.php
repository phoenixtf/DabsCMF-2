<?
namespace MTK\Blocks;

use CMS\Project\Block\Entity as Block;
use MTK\Model\Article\Manager as ArticleManager;

class news extends Block {

	public function controller($mods = array(), $vars = array()) {
		$items = $this->getItems();
		return array(
			"items" => $items,
			"type" => empty($mods["type"])?null:$mods["type"]
		);
	}

	private function getItems() {
		$articles = $this->project->initModel("Article");
		// Альтернативный вариант
		// $articles = new ArticleManager();
		// но для этого нужно либо писать инклюд, либо настраивать автолоад

		return $articles->getAll(null, array("limit" => 10));
	}
}
