@extends('layouts.admin.default')

@section('content')
		
	<h2 class="sub-header">Posts <a href="{{ URL::action('AdminPostsController@create') }}" class="btn btn-primary pull-right" role="button"><span class="glyphicon glyphicon-plus"></span>&nbspNew post</a></h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Posted at</th>
					<th>Updated at</th>
					<th>Author</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($posts as $post)
				
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->created_at }}</td>
					<td>{{ $post->updated_at }}</td>
					<td>{{ $post->user->username }}</td>
					<td>
						<div>
							{{ Form::open(['url' => URL::action('AdminPostsController@destroy', $post->id), 'method' => 'delete', 'class' => '']) }}
	        				<a href="{{ URL::action('AdminPostsController@edit', $post->id) }}" class="btn btn-primary" role="button" data-toggle="tooltip" data-placement="top" title="Edit"><span class='glyphicon glyphicon-pencil'></span></a>
							<a href="{{ URL::action('AdminCommentsController@show', $post->id) }}" class="btn btn-primary {{ (count($post->comments) == 0 ? 'disabled' : '') }}" role="button" data-toggle="tooltip" data-placement="top" title="View comments"><span class='glyphicon glyphicon-comment'></span></a>
	        				<button type="submit" class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Delete"><span class='glyphicon glyphicon-remove'></span></button>
	    					{{ Form::close() }}
	    				</div>
					</td>
				</tr>
					
				@endforeach
				
			</tbody>
		</table>
	</div>
	
	<div class="text-center">
		{{ $posts->links() }}
	</div>

@stop
