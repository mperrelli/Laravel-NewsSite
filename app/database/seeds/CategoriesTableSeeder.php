<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{	
		Category::create(array(
				'name' => "Tech"
			));
			
		Category::create(array(
				'name' => "Business"
			));
		
		Category::create(array(
				'name' => "Politics"
			));
			
		Category::create(array(
				'name' => "Entertainment"
			));
			
		Category::create(array(
				'name' => "Lifestyle"
			));
			
		Category::create(array(
				'name' => "Sports"
			));
	}

}