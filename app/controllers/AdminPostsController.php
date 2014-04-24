<?php

use Blogsite\Repositories\PostRepositoryInterface;

class AdminPostsController extends \BaseController {

	/**
	 * @var Blogsite\Repositories\DbPostRepository
	 */
	protected $post;
	
	public function __construct(PostRepositoryInterface $post)
	{
		$this->post = $post;
	}
	
	/**
	 * Display a listing of all posts.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->getAllInOrder()->paginate(15);
		
		return View::make('admin.posts.index', compact('posts'));		
	}

	/**
	 * Show the form for creating a new post.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$catagories = $this->post->getAllCatagories();
		
		$users = User::all();
		
		return View::make('admin.posts.create',  array('catagories' => $catagories, 'users' => $users));
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), array('title' => 'required', 'body' => 'required'));
		
		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		
		$input = Input::all();
		
		$post = $this->post->storeWithInput($input['title'], $input['body'], $input['author'], $input['catagories']);
		
		return Redirect::to(URL::action('AdminPostsController@show', $post));
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->post->getById($id);
		
		return View::make('admin.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->getById($id);
		
		$catagories = $this->post->getAllCatagories();
		
		$users = User::all();
		
		return View::make('admin.posts.edit',  array('post' => $post, 'catagories' => $catagories, 'users' => $users));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validation = Validator::make(Input::all(), array('title' => 'required', 'body' => 'required'));
		
		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		
		$input = Input::all();
		
		$post = $this->post->updateWithInput($id, $input['title'], $input['body'], $input['author'], $input['catagories']);
		
		return Redirect::to(URL::action('AdminPostsController@show', $post));
	}

	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->post->deleteById($id);
		
		return Redirect::to(URL::action('AdminPostsController@index'));
	}

}