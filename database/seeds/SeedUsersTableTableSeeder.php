<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedUsersTableTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();

		$users = [
            [
                'username' => 'test1',                
                'email' => 'emily.thorn@gmail.com',
                'password' => Hash::make('test1')
            ],
            [
                'username' => 'test2',                
                'email' => 'fred.jackson@gmail.com',
                'password' => Hash::make('test2')
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
	}

}
