# Laravel CMS Scaffolding

This project contains the boilerplate functionality that you would expect to see in a Laravel CMS. That way you can start working on your cool features instead of having to worry about the routing and content retrieval.

This scaffolding project is written in Laravel 5.4.

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

## Development Data

This project comes with several migrations and seeders. The migrations included create the following tables:

* `users`
* `roles`
* `user_roles`
* `sites`
* `pages`
* `revisions`

There is also seeder data for every table that sets-up two example sites along with the relevant revisions, pages, and themes.

## Debugging

The Laravel Debugbar (`barryvdh/laravel-debugbar`) is one of the dependencies for this repository. If you do not wish to use the debug bar, either remove the service provider in `config/app.php` or set `APP_DEBUG=false` in your `.env` file.