<?php

namespace CMS\Project;

use CMS\Abstracts\Responce as ResponceAbstract;

class Responce extends ResponceAbstract {

	final function __construct($status, $type, $body) {
		$this->status = $status;
		$this->type = $type;
		$this->body = $body;
	}

	public function toBrowser() {

		if ($this->status == $this::STATUS_ERROR_NOT_FOUND) {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
		} elseif($this->status == $this::STATUS_ERROR_SYSTEM) {
			header($_SERVER["SERVER_PROTOCOL"]." 503 Service Unavailable", true, 503);
		} elseif($this->status == $this::STATUS_OK) {
			header($_SERVER["SERVER_PROTOCOL"]." 200 OK", true, 200);
		} else {
			throw new Error(Error::RESPONCE_STATUS_UNKNOWN, $this->status);
		}
		// todo проверка типа

		echo $this->body;
	}
}