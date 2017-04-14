<?php

namespace App\Exceptions;

use Exception;

class ThemeNotFoundException extends Exception
{
	public function __construct($message="The theme could not be found") {
		parent::__construct($message);
	}
}