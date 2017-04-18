<?php

// This file contains global helper functionality for the entire CMS application

/**
 * Returns a URL prefixed with the CMS admin panel prefix.
 *
 * @param string $uri The URI to prefix with the admin panel URI
 * @return string
 */
function cmsUrl($uri="") {
	$uriPrefix = config('cms.admin_uri');
	if(!empty($uriPrefix)) {
		return url($uriPrefix . "/" . $url);
	}

	return url(!empty($url) ? $url : "/");
}