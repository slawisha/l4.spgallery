<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('roles')->truncate();

		$roles = array(
			'name' => 'admin',
		);
		// Uncomment the below to run the seeder
		 DB::table('roles')->insert($roles);

		 $roles = array(
			'name' => 'editor',
		);

		  DB::table('roles')->insert($roles);

	}

}
