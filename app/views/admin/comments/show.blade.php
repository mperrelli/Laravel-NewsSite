@extends('layouts.admin.default')

@section('content')
		
	<h2 class="sub-header">Comments for post: {{ $post->title }}</h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Posted at</th>
					<th>Name</th>
					<th>Message</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($post->comments as $comment)
				
				<tr>
					<td>{{ $comment->id }}</td>
					<td>{{ $comment->created_at }}</td>
					<td>{{{ $comment->name }}}</td>
					<td>{{{ $comment->body }}}</td>
					<td>
						{{ Form::open(['url' => URL::action('AdminCommentsController@destroy', $comment->id), 'method' => 'delete', 'class' => 'form-inline']) }}
        				<button type="submit" class="btn btn-danger form-control" role="button"><span class='glyphicon glyphicon-remove'></span></button>
    					{{ Form::close() }}
					</td>
				</tr>
					
				@endforeach
				
			</tbody>
		</table>
	</div>

@stop
