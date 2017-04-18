<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes specific to the CMS itself (not the display of its dynamic content)
// are all prefixed with a specific URI.
//
// If you'd like to modify the prefixed URI for the admin panel, modify the
// CMS_ADMIN_URI value in your .env file
Route::group(['prefix' => config('cms.admin_uri')], function() {
	
	Route::get('/', 'HomeController@index')->name('home');
	
});

// Notice how there are no routes defined to retrieve dynamic content. This is
// because we are exploiting how the exception handling works in Laravel. We want
// a NotFoundHttpException to be thrown for the dynamic content in order for the
// exception to bubble up to the global exception handler. At that point we want
// to perform a database lookup and then display the content as necessary.