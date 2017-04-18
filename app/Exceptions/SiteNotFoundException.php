<?php

namespace App\Exceptions;

use Exception;

class SiteNotFoundException extends Exception
{
	public function __construct($site, $message="The specified site could not be found.") {
		parent::__construct($message);
	}
}