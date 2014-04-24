<?php

use Blogsite\Repositories\PostRepositoryInterface;

class PostsController extends \BaseController {

	protected $post;
	
	public function __construct(PostRepositoryInterface $post)
	{
		$this->post = $post;
	}
	
	/**
	 * Display a listing of all the posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->getAllInOrder()->paginate(5);
		
		return View::make('posts.index', compact('posts'));	
	}
	
	/**
	 * Display a listing of posts with a given category
	 *
	 * @return Response
	 */
	public function viewByCategory($category)
	{
		$posts = $this->post->getByCategory($category)->paginate(5);
		
		return View::make('posts.index', compact('posts'));	
	}
	
	/**
	 * Display a listing of posts in a given month
	 *
	 * @return Response
	 */
	public function viewByDate($year, $month)
	{	
		$posts = $this->post->getByYearAndMonth($year, $month)->paginate(5);
														
		return View::make('posts.index', compact('posts'));	
	}

	/**
	 * Display a single post
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->post->getById($id);
		
		return View::make('posts.show', compact('post'));
	}

}