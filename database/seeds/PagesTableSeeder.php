<?php

use Illuminate\Database\Seeder;

use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some pages
        $pages = [
        	[
                // http://localhost
                'site_id' => 1,
                'author_id' => 2,
                'path' => null, // landing page
                'title' => "Landing page",
                'content' => "This is the local host landing page",
            ],
            [
                // http://localhost/about
                'site_id' => 1,
                'author_id' => 2,
                'path' => "about",
                'title' => "About page",
                'content' => "This is the local host about page",
            ],
            [
                // http://localhost/other-site
                'site_id' => 2,
                'author_id' => 2,
                'path' => null, // landing page
                'title' => "Landing page",
                'content' => "This is the other local host landing page",
            ],
            [
                // http://localhost/other-site/about
                'site_id' => 2,
                'author_id' => 2,
                'path' => "about",
                'title' => "About page",
                'content' => "This is the other local host about page",
            ],
        ];

        // create the pages
        Page::insert($pages);
    }
}
