@extends('layouts.admin.default')

@section('content')
		
	<h2 class="sub-header">Comments</h2>
	<div class="table-responsive">
		<table class="table table-striped table-condensed">
			<thead>
				<tr>
					<th>ID</th>
					<th>Posted at</th>
					<th>Article Title</th>
					<th>Message</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($comments as $comment)
				
				<tr>
					<td>{{ $comment->id }}</td>
					<td>{{ $comment->created_at }}</td>
					<td>{{{ $comment->post['title'] }}}</td>
					<td>{{{ substr(stripslashes($comment->body) , 0, 100) }}}...</td>
					<td>
						<div class="pull-right">
							{{ Form::open(['url' => URL::action('AdminCommentsController@destroy', $comment->id), 'method' => 'delete', 'class' => 'form-inline']) }}
								<a href="{{ URL::action('AdminCommentsController@show', $comment->post_id) }}" class="btn btn-primary btn-xs" role="button"><span class='glyphicon glyphicon-zoom-in'></span></a>
	    						<button type="submit" class="btn btn-danger btn-xs" role="button"><span class='glyphicon glyphicon-remove'></span></button>
	    					{{ Form::close() }}
    					</div>
					</td>
				</tr>
					
				@endforeach
				
			</tbody>
		</table>
	</div>
	
	<div class="text-center">
		{{ $comments->links() }}
	</div>

@stop
