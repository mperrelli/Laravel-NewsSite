<?php

class AdminCommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = Comment::with('post')->orderBy('created_at', 'desc')->paginate(15);
		
		return View::make('admin.comments.index', compact('comments'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		
		return View::make('admin.comments.show', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);
		
		return Redirect::back();
	}

}