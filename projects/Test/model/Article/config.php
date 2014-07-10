<?

namespace Test\Model\Article;

use CMS\Project\Config as ProjectConfig;

class Config extends ProjectConfig {

	public $fields = array(
		"id",
		"parent-id",
		"name",
		"title",
		"meta-title",
		"meta-description",
		"meta-keywords",
		"content",
		"date-added",
		"date-updated",
		"date-published"
	);

	public $catId = 3;

}