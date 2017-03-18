<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create some users
        $users = [
        	[
        		'username' => 'admin',
        		'password' => bcrypt('admin'),
        		'display_name' => 'Administrator',
        	],
        	[
        		'username' => 'creator',
        		'password' => bcrypt('creator'),
        		'display_name' => 'Content Creator',
        	],
        ];

        // create the users
        User::insert($users);
    }
}
