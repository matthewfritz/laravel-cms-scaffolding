<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// users and roles
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);

        // content
        $this->call(SitesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(RevisionsTableSeeder::class);
    }
}
