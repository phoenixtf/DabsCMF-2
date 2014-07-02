<?
namespace MTK\Blocks;

use CMS\Project\Block;

class header extends Block\Entity {

	protected function controller() {
		$this->addBlock("auth");
		/*
		// Добавление блока
		$this->var = $this->addBlock("blockname",
			array("mod-name"=>"mod-val")
		);

		// Передача значения во view
		$this->content = "Hello world!";
		*/

		return;
	}

}