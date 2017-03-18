<?php

use Illuminate\Database\Seeder;

use App\Models\UserRole;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some user roles
        $ur = [
        	[
        		'user_id' => 1,
                'site_id' => 0, // 0 means a global role
                'role' => 'admin',
        	],
        	[
        		'user_id' => 2,
                'site_id' => 1,
                'role' => 'creator',
        	],
            [
                'user_id' => 2,
                'site_id' => 2,
                'role' => 'creator',
            ],
        ];

        // create the user roles
        UserRole::insert($ur);
    }
}
