# Laravel CMS Scaffolding

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT) [![Project Version 1.0.0](https://img.shields.io/badge/Project_Version-1.0.0-green.svg)](https://packagist.org/packages/matthewfritz/laravel-cms-scaffolding) [![Laravel 5.4](https://img.shields.io/badge/Laravel-5.4-green.svg)](https://laravel.com/docs/5.4)

This project contains the boilerplate functionality that you would expect to see in a Laravel CMS. That way you can start working on your cool features instead of having to worry about the routing and content retrieval.

This scaffolding project is written in Laravel 5.4.

## Installation

This project can be installed from Composer.

`composer create-project --prefer-dist matthewfritz/laravel-cms-scaffolding my-custom-cms`

## Features

Out of the box, you get a bunch of features. This `laravel-cms-scaffolding` project can actually be used as a basic lightweight CMS on its own. However, you will probably want to use it as a jumping-off point for larger projects since it takes care of the CMS boilerplate for you.

* Support for multiple sites within the same domain
* Support for sites nested deeper than the top-level of the domain
* Support for multiple domains/sub-domains on the same machine
* Support for a proxy/load-balancer when routing to the proper site
* Support for customizable themes using Blade and HTML
* Support for site-wide and single-page themes
* Support for the following templates within a theme: regular page, landing page, custom 404 page
* Support for a 404 page using the site's theme
* Support for the revision history of a page

## Themes

Themes are located in the `resources/views/themes` directory. There are two example bare-bones themes included that demonstrate various bits of functionality supported by this project.

### Default Theme

This theme is located in `resources/views/themes/default`.

This theme is automatically applied when a site does not specify which one to use. It uses a regular page rendering template but also includes a custom 404 page template.

It is a basic Bootstrap theme.

### Carousel Theme

This theme is located in `resources/views/themes/carousel`.

This theme includes a regular page rendering template but also includes a rendering template to be used specifically for the landing page of a site.

It is a basic Bootstrap theme but the landing page uses a custom rendering template that includes a Bootstrap carousel.

## Environment Configuration

Make sure you update your `.env` file, specifically the values that begin with `DB_` since that's the database configuration section.

### Admin Panel URI

You can override the URI prefix for the CMS admin panel by modifying the `CMS_ADMIN_URI` value in your `.env` file. It is `cms-admin` by default so that would give you a URL of `http://localhost/cms-admin`, for example. If you wanted something different, you could do the following as an example:

`CMS_ADMIN_URI=my-cms`

The URL to the admin panel based on this example would then be `http://localhost/my-cms`.

You can then generate the absolute URLs to pages within your admin panel using the `cmsUrl()` helper function. For example:

`<a href="{{ cmsUrl('pages/create') }}">Create New Page</a>`

You can also generate the link markup directly and then display it:

`{!! cmsLinkTo('pages/create', 'Create New Page') !!}`

### Application Timezone

You can override the timezone used by the application by modifying the `APP_TIMEZONE` value in your `.env` file. It is `UTC` by default. If you wanted something different, you could do the following as an example:

`APP_TIMEZONE=America/Los_Angeles`

### Custom CMS Configuration Values

You can place configuration values specific to your custom CMS in `config/cms.php`.

## Database Tables

This project comes with several migrations. The migrations included create the following tables:

* `users`
* `roles`
* `user_roles`
* `sites`
* `pages`
* `revisions`

Run the migrations with the following command:

`php artisan migrate`

### Database Data

You can run the database seeders with the following command:

`php artisan db:seed`

This will give you data for all of the tables in the system and you get two sites fully-bootstrapped.

## Debugging

The Laravel Debugbar (`barryvdh/laravel-debugbar`) is one of the dependencies for this repository. If you do not wish to use the debug bar, either remove the service provider in `config/app.php` or set `APP_DEBUG=false` in your `.env` file.