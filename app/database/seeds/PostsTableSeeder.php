<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{	
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			$post = Post::create(array(
				'user_id' => 1,
				'title' => $faker->sentence($nbWords = 4),
				'body' => $faker->text($maxNbChars = 1500),
				'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
			));
			
			for($i = 0; $i < $faker->randomNumber(1,2); $i++)
			{
				$post->categories()->attach($faker->randomNumber(1, 6));
			}		
		}
	}

}