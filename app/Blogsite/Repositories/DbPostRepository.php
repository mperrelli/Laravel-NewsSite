<?php

namespace Blogsite\Repositories;

use Post;
use Category;

class DbPostRepository implements PostRepositoryInterface {
	
	/**
	 * Returns all the results in order based on the timestamp
	 *
	 * @return Post
	 */
	public function getAllInOrder()
	{
		return Post::orderBy('created_at', 'desc');
	}
	
	/**
	 * Returns a specific post with an id
	 *
	 * @param int $id
	 * @return Post
	 */
	public function getById($id)
	{
		return Post::findOrFail($id);
	}
	
	/**
	 * Returns all posts in a given month and year
	 * 
	 * @param int $year, int $month
	 * @return Post
	 */
	public function getByYearAndMonth($year, $month)
	{
		/*
		 * This constructs a string to check against the column 'timestamp' in the posts table.
		 * It is constructed in the form of yyyy-mm to match the first 7 characters in the timestamp.
		 * 
		 * I had to add a leading zero to the months that came before october to match
		 * timestamp syntax in the tables.
		 */
		$checkString = $year . "-" . ($month < 10 ? '0' : '') . $month;
		
		// Return posts where the substring of the timestamp matches the string generated above
		return Post::where(\DB::raw('SUBSTRING(created_at, 1, 7)'), '=', $checkString)
		->orderBy('created_at', 'desc');
		
	}
	
	/**
	 * Return all posts with a given category
	 *
	 * @param string $category
	 * @return Post
	 */
	public function getByCategory($category)
	{
		// Grab all posts of a given category by utilizing subqueries
		return Post::with('categories')->whereHas('categories', function($query)use($category)
		{
			$query->where('name', '=', $category);
		})->orderBy('created_at', 'desc');
	}
	
	/**
	 * Creates a new post with given inputs and returns the new 
	 * id of that post
	 *
	 * @param  string $title, string $body, int $authorId, int[] $categories
	 * @return int  $id
	 */
	public function storeWithInput($title, $body, $authorId, $categories)
	{		
		$post = new Post;
		
		$post->title = $title;
		$post->body = $body;
		$post->user_id = $authorId;
		
		$post->save();
		
		foreach($categories as $cataId)
		{
			$post->categories()->attach($cataId);
		}
		
		return $post->id;		
	}
	
	/**
	 * Updates a post with given input and the posts id.
	 *
	 * @param  int $id, string $title, string $body, int $authorId, int[] $categories
	 * @return int  $id
	 */
	public function updateWithInput($postId, $title, $body, $authorId, $categories)
	{
		$post = $this->getById($postId);
		
		$post->title = $title;
		$post->body = $body;
		$post->user_id = $authorId;
		
		/**
		 * Remove all categories from pivot table entries and then rewrite 
		 * them in case they have changed.
		 */ 
		$post->categories()->detach();
		
		foreach($categories as $cataId)
		{
			$post->categories()->attach($cataId);
		}
		
		$post->save();
		
		return $post->id;
	}
	
	/**
	 * Removes a post from storage.
	 *
	 * @param int $id
	 */
	public function deleteById($postId)
	{
		Post::destroy($postId);
	}
	
	/**
	 * Returns all categories
	 *
	 * @return Category
	 */
	public function getAllCategories()
	{
		return Category::all();
	}
	
	/**
	 * Returns an archive listing on months and the amount of posts in each
	 * 
	 * Query for generating a list of months and years and the posts count for each modified from
	 * http://stackoverflow.com/questions/16494821/generating-archive-list-for-a-blog-in-laravel
	 *
	 * @return String[] $links;
	 */
	public function getArchive()
	{
	    $archive = \DB::table('posts')
	    ->select(\DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
	    ->groupBy('year')
	    ->groupBy('month')
	    ->orderBy('year', 'desc')
	    ->orderBy('month', 'desc')
	    ->get();
		
		return $archive;
	}
	
}
