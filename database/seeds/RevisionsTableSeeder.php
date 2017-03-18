<?php

use Illuminate\Database\Seeder;

use App\Models\Revision;

class RevisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some revisions
        $revisions = [
        	[
                // http://localhost
                'page_id' => 1,
                'user_id' => 2,
                'old_value' => null,
                'new_value' => "{site_id: 1, author_id: 2, path: null, title: 'Landing page', content: 'This is the local host landing page'}",
            ],
            [
                // http://localhost/about
                'page_id' => 2,
                'user_id' => 2,
                'old_value' => null,
                'new_value' => "{site_id: 1, author_id: 2, path: 'about', title: 'About page', content: 'This is the local host about page'}",
            ],
            [
                // http://localhost/other-site
                'page_id' => 3,
                'user_id' => 2,
                'old_value' => null,
                'new_value' => "{site_id: 2, author_id: 2, path: null, title: 'Landing page', content: 'This is the other local host landing page'}",
            ],
            [
                // http://localhost/other-site/about
                'page_id' => 4,
                'user_id' => 2,
                'old_value' => null,
                'new_value' => "{site_id: 2, author_id: 2, path: 'about', title: 'About page', content: 'This is the other local host about page'}",
            ],
        ];

        // create the revisions
        Revision::insert($revisions);
    }
}
