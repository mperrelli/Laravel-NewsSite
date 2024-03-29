<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoriesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CommentsTableSeeder');
	}

}