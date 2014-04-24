@extends('layouts.default')

@section('content')

	<div class="col-sm-8 blog-main">
	
		@foreach($posts as $post)
		
			@include('posts.post_template')
			
		@endforeach
	
		<div class="text-center">
			{{ $posts->links() }}
		</div>
	
	</div>

@stop
