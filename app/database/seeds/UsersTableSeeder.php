<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();
		
		User::create(array(
				'username' => "Matt",
				'password' => Hash::make('password')
			));
			
		User::create(array(
				'username' => "John",
				'password' => Hash::make('password')
			));
			
		User::create(array(
				'username' => "Roger",
				'password' => Hash::make('password')
			));
			
		User::create(array(
				'username' => "Admin",
				'password' => Hash::make('password')
			));
	}

}