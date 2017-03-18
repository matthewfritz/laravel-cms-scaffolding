<?php

namespace App\Classes;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * This class provides helper functionality for retrieving content.
 *
 * @author Matthew Fritz <mattf@burbankparanormal.com>
 */
class ContentHelper {

	/**
	 * Returns the content for the page with the given path. Throws an instance
	 * of NotFoundHttpException if the content could not be found.
	 *
	 * @param string $path The path for which to do the lookup
	 * @return string
	 *
	 * @throws NotFoundHttpException
	 */
	public static function getContent(string $path="/") {
		// TODO: Retrieve the content based on the path or throw a new instance
		// of NotFoundHttpException
		throw new NotFoundHttpException();
	}

}