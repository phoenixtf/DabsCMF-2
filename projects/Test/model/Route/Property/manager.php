<?
namespace Test\Model\Route\Property;

use Test\Model\Property\Manager as PropertyManager;

include_once __DIR__."/../../Property/manager.php";

class Manager extends PropertyManager {

	const DIR = __DIR__;

	protected $propAliases = array(
		"id" => "id",
		"parent-id" => "parentId",
		"hidden" => "hidden",
		"undeletable" => "undeletable",
		"name" => "name",
		"title" => "title",
		"block" => "name",
		"block-parent" => "blockParent",
		"meta-title" => "meta-title",
		"meta-description" => "metaDescription",
		"meta-keywords" => "meta-keywords",
		"content" => "content",
		"list-order" => "listOrder",
		"date-added" => "dateAdded",
		"date-updated" => "dateUpdated",
		"date-published" => "datePublished",
	);

	public $id = "content";
	public $title = "title";
	public $content = "content";
	//public $date-published = "date";

}