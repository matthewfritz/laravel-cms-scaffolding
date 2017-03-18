<?php

use Illuminate\Database\Seeder;

use App\Models\Site;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some sites
        $sites = [
        	[
                // site URL: http://localhost
        		'domain' => 'localhost',
        		'base_path' => null,
        		'display_name' => 'Local Host Site',
        	],
            [
                // site URL: http://localhost/other-site
                'domain' => 'localhost',
                'base_path' => 'other-site',
                'display_name' => 'Other Local Host Site',
            ],
        ];

        // create the sites
        Site::insert($sites);
    }
}
