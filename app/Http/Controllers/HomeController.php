<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {
	
	/**
	 * Returns the response for the admin landing page.
	 */
	public function index() {
		return "CMS admin landing page";
	}

}