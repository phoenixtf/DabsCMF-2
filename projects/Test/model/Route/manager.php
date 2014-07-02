<?
namespace MTK\Model\Route;

use CMS\Project\Model\Manager as ModelManager;

include_once __DIR__."/entity.php";
include_once __DIR__."/error.php";
include_once __DIR__."/config.php";

// Инклюд свойств
include_once __DIR__."/Property/manager.php";


class Manager extends ModelManager {

	/*protected $db_static = array(
		1 => array(
			"id" => 1,
			"url" => "/news/1/",
			"title" => "Первая новость",
			"description" => ""
		),
		2 => array(
			"id" => 2,
			"url" => "/news/2/",
			"title" => "Вторая новость",
			"description" => ""
		),
		3 => array(
			"id" => 3,
			"url" => "/news/3/",
			"title" => "Третья новость",
			"description" => ""
		),
	);*/

	public function get($id)
	{
		if (empty($id)) throw new Error(Error::PARAM_NOT_FOUND);
		$row = $this->db->selectRow("
SELECT
	?#
FROM
	?__route
WHERE
	id = ?d
		",
			$this->config->fields,
			$id
		);
		if (empty($row)) throw new Error(Error::GET_NO_RESULT);
		return current($this->populate($row, $this));
	}

	public function getAll($ids = array(), $params = array())
	{
		//if (empty($ids)) throw new Error(Error::PARAM_NOT_FOUND);
		// так как мы в namespace Article, Error соотв. тоже из этого namespace, явно юзать его необязательно

		$rows = $this->db->select("
SELECT
	?#
FROM
	?__route
WHERE
	1
{ AND
	id IN(?a) }
AND
	`parent-id` = ?d
ORDER BY
	`list-order`
DESC
{ LIMIT
	?d }
",
			$this->config->fields,
			!empty($ids)?$ids:DBSIMPLE_SKIP,
			$this->config->catId,
			!empty($params["limit"])?$params["limit"]:DBSIMPLE_SKIP
		);

		return $this->populate($rows);
	}


}

