@extends('layouts.admin.default')

@section('content')

	{{ Form::open(['url' => URL::action('AdminPostsController@update', $post->id), 'method' => 'put']) }}
		
		<div class="form-group">
			<label for="titleInput">Title</label>
			<input type="title" name="title" class="form-control" id="titleInput" value="{{{ $post->title }}}">
		</div>
		
		<div class="form-group">
			<label for="bodyInput">Body</label>
			<textarea class="form-control" name="body" rows="5" id="bodyInput">{{{ $post->body }}}</textarea>
		</div>
		
		<div class="form-group">
			<label for="authorInput">Author</label>
			<select class="form-control" name="author" id="authorInput">
				@foreach($users as $user)
					@if($user->username == $post->user->username)
						<option value="{{ $user->id }}" selected>{{ $user->username }}</option>
					@else
						<option value="{{ $user->id }}">{{ $user->username }}</option>
					@endif
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="catagoriesInput">Catagories</label>
			<select multiple class="form-control" name="catagories[]" id="catagoriesInput">
				@foreach($catagories as $category)
					@if(in_array($category->name, $post->categories->fetch('name')->toArray())) 
						<option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
					@else
						<option value="{{ $category->id }}">{{ $category->name }}</option> 
					@endif
				@endforeach
			</select>
			</div>
		
		<div class="pull-right">
			<a href="{{ URL::action('AdminPostsController@index') }}" class="btn btn-default">Cancel</a>
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
		
	{{ Form::close() }}

@stop
