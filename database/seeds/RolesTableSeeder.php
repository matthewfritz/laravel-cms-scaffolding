<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some roles
        $roles = [
        	[
                'system_name' => 'admin',
                'display_name' => 'Administrator',
            ],
            [
                'system_name' => 'creator',
                'display_name' => 'Content Creator',
            ],
        ];

        // create the roles
        Role::insert($roles);
    }
}
