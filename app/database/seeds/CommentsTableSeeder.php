<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		Comment::truncate();
		
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Comment::create(array(
				'post_id' => $faker->randomNumber(1, 20),
				'name' => $faker->name,
				'body' => $faker->text($maxNbChars = 200)
			));
		}
	}

}