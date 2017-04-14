<?php

namespace App\Classes;

use App\Exceptions\ThemeNotFoundException;

/**
 * This class provides helper functionality for retrieving themes.
 *
 * @author Matthew Fritz <mattf@burbankparanormal.com>
 */
class ThemeHelper {

	/**
	 * Returns the dot-notation path to the theme with the given name. Throws
	 * a ThemeNotFoundException if the theme could not be found or read.
	 *
	 * @param string $themeName The name of the directory where the theme lives
	 *
	 * @return string
	 * @throws ThemeNotFoundException
	 */
	public static function getDotPath($themeName) {
		// empty theme name means use the default theme
		if(empty($themeName)) {
			$themeName = "default";
		}

		$slug = "themes/{$themeName}";
		$path = resource_path("views/{$slug}");

		if(is_dir($path) && is_readable($path)) {
			return str_replace("/", ".", $slug);
		}

		throw new ThemeNotFoundException(
			"The theme \"{$themeName}\" either does not exist or is not readable."
		);
	}

	/**
	 * Retrieve the dot-notation path to the rendering page for the specified
	 * page in the site. Throws a ThemeNotFoundException if the theme could not
	 * be found or read.
	 *
	 * @param Site $site The site to check for a theme entry
	 * @param Page $page The page to check for a theme entry
	 *
	 * @return string
	 * @throws ThemeNotFoundException
	 */
	public static function getDotPathForSitePage($site, $page) {
		// allow a page to override the site theme
		if(!empty($page->theme)) {
			$theme = $page->theme;
		}
		else
		{
			$theme = $site->theme;
		}

		// get the dot-notation for the theme and then generate the directory
		// path on the filesystem
		$dotPath = self::getDotPath($theme);
		$dirPath = resource_path("views/" . str_replace(".", "/", $dotPath));

		// here we need to make a decision: if the page is the landing page of
		// the site AND we have a landing page override for the theme we need
		// to return that path. Otherwise, we return the path to the single-page
		// rendering file.
		$renderer = "page";
		$landingPageRenderer = "landing";
		if(empty($page->path) && is_readable("{$dirPath}/{$landingPageRenderer}.blade.php")) {
			$renderer = $landingPageRenderer;
		}

		return "{$dotPath}.{$renderer}";
	}

}