@extends('layouts.admin.default')

@section('content')

	<div class="col-sm-8 blog-main">
		
			@include('posts.post_template')
			
			<a href="{{ URL::action('AdminPostsController@edit', $post->id) }}" class="btn btn-primary pull-left" role="button"><span class='glyphicon glyphicon-pencil'></span></a>
	
	</div>

@stop
