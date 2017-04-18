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
		return url($uriPrefix . "/" . $uri);
	}

	return url(!empty($uri) ? $uri : "/");
}

/**
 * Returns a generated <a> tag to link to the specified URI using optional
 * link text and link parameters.
 *
 * @param string $uri The URI for which a link should be generated
 * @param string $linkText Optional display text for the link
 * @param array $linkParams Optional parameters for the link
 *
 * @return string
 */
function cmsLinkTo($uri, $linkText="", $linkParams=[]) {
	$url = cmsUrl($uri);
	$text = (!empty($linkText) ? $linkText : $url);

	$link = "<a href=\"{$url}\"";

	// add the link parameters
	foreach($linkParams as $key => $value) {
		$link .= " {$key}=\"{$value}\"";
	}

	$link .= ">{$text}</a>";
	return $link;
}