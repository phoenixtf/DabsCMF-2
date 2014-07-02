<?php
/**
 * Date: 03.06.14
 * Time: 14:53
 */

namespace CMS\Abstracts;


abstract class Responce {

	const TYPE_JSON = "json";
	const TYPE_HTML = "html";
	const TYPE_XML = "xml";

	const STATUS_OK = 200;
	const STATUS_ERROR_SYSTEM = 500;
	const STATUS_ERROR_NOT_FOUND = 404;

	protected $type;
	protected $body;
	protected $status;

	/**
	 * Отдаёт ответ в браузер.
	 *
	 * @return bool
	 */
	abstract function toBrowser();

} 