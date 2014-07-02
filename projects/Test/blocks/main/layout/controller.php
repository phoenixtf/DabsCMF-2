<?
namespace MTK\Blocks;

use CMS\Project\Block\Entity as Block;
use CMS\Project\Block\Error as Error;

class layout extends Block {

	protected function controller() {
		$this->addBlock("header");
		$this->addBlock("news");
		return;
	}

}