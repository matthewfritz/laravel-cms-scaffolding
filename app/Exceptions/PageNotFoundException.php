<?php

namespace App\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
	private $site;

	public function __construct($site, $message="The specified page could not be found.") {
		parent::__construct($message);

		$this->site = $site;
	}

	public function getSite() {
		return $this->site;
	}
}