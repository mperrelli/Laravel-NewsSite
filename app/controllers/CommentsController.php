<?php

class CommentsController extends \BaseController {

	/**
	 * Store a newly created comment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		
		// Set rules for available fields
		$rules = array('message' => 'required|regex:/[a-zA-Z]/', 
				  	   'name' => 'required|regex:/[a-zA-Z]/');
					   
		if(!Auth::check())
		{
			$rules[] = array('captcha' => 'required|captcha');
		}
		
		$validation = Validator::make(Input::all(), $rules);
		
		// Check input against rules
		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		
		// Create a comment and populate the data and save it
		$comment = new Comment;
		
		$comment->post_id = $input['post_id'];
		$comment->name = $input['name'];
		$comment->body = $input['message'];
		
		$comment->save();
		
		// Redirect the user back to the post page
		return Redirect::to(URL::action('PostsController@show', $comment->post_id));
	}

}