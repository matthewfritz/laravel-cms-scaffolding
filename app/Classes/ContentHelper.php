<?php

namespace App\Classes;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Models\Page;
use App\Models\Site;

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
	 * @param string $domain The domain for which to retrieve content
	 * @param string $path The path for which to do the lookup
	 * @return string
	 *
	 * @throws NotFoundHttpException
	 */
	public static function getContent(string $domain, string $path="/") {
		// check to see whether we are at the root of a domain or whether we
		// are in the first step of a pth
		$pathComponents = explode("/", $path);

		// if no site exists with this first-level path component, try to resolve
		// the site again but with the root-level hierarchy
		$site = Site::where('domain', $domain)
			->where('base_path', $pathComponents[0])
			->first();

		// the page requested may be at the top-level instead
		if(empty($site)) {
			$site = Site::where('domain', $domain)
				->whereIsEmpty('base_path')
				->first();
		}
		else
		{
			// remove the first path component in the URL since it references
			// the path to the site and not the path to the page
			unset($pathComponents[0]);
		}

		// only proceed with the retrieval of the page if the site has been
		// resolved properly
		$pagePath = implode("/", $pathComponents);
		if(!empty($site)) {
			if(empty($pagePath) || $pagePath == "/") {
				// resolve the landing page of the site
				$page = Page::where('site_id', $site->id)
					->whereIsEmpty('path')
					->first();
			}
			else
			{
				// resolve a page within the site hierarchy
				$page = Page::where('site_id', $site->id)
					->where('path', $pagePath)
					->first();
			}

			// return the response with the data if the page exists
			if(!empty($page)) {
				// display the page within the proper theme renderer using the
				// dot notation for the path
				$renderer = ThemeHelper::getDotPathForSitePage($site, $page);
				return view($renderer, compact('site', 'page'));
			}
		}

		// the page has not been found so throw a new instance of the exception
		// NotFoundHttpException to bubble back up to the exception handler
		throw new NotFoundHttpException();
	}

}