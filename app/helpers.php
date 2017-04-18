<?php

// This file contains global helper functionality for the entire CMS application

/**
 * Returns a URL prefixed with the CMS admin panel prefix.
 *
 * @param string $uri The URI to prefix with the admin panel URI
 * @return string
 */
function cmsUrl($uri="") {
	// if we have an absolute URL, just return it
	if(starts_with($uri, 'http://') || starts_with($uri, 'https://')) {
		return $uri;
	}

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

/**
 * Returns a generated <a> tag to link to the specified named route using
 * optional route parameters, link text and link parameters.
 *
 * @param string $route The named route for which a link should be generated
 * @param array $routeParams Optional array of route parameters
 * @param string $linkText Optional display text for the link
 * @param array $linkParams Optional parameters for the link
 *
 * @return string
 */
function cmsLinkToRoute($route, $routeParams=[], $linkText="", $linkParams=[]) {
	$url = route($route, $routeParams);
	return cmsLinkTo($url, $linkText, $linkParams);
}