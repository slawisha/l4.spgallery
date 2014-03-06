<?php

use Spgallery\User as User;

class UsersTableSeeder extends Seeder {


	public function run()
	{
		User::truncate();

		User::create([
				'username' => 'slawisha',
				'email' =>'slawisha@yahoo.com',
				'role_id' => 1,
				'password' => Hash::make('arpeggio')
			]);
	}

}
