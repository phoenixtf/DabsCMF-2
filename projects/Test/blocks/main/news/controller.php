<?
namespace Test\Blocks;

use CMS\Project\Block\Entity as Block;
use Test\Model\Article\Manager as ArticleManager;

class news extends Block {

	public function controller($mods = array(), $vars = array()) {
		$items = $this->getItems();
		$itemsBlocks = [];
		foreach($items as $item) {
			$id = $item->property->get("id")->get();
			$itemsBlocks[] = $this->addBlock("newsItem", array(), array("id" => $id));
		}
		return array(
			"items" => $itemsBlocks,
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
