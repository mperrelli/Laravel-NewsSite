@extends('layouts.admin.default')

@section('content')
	
	{{ Form::open(['url' => URL::action('AdminPostsController@store'), 'method' => 'post']) }}
		
		<div class="form-group">
			<label for="titleInput">Title</label>
			<input type="title" name="title" class="form-control" id="titleInput">
		</div>
		
		<div class="form-group">
			<label for="bodyInput">Body</label>
			<textarea class="form-control" name="body" rows="5" id="bodyInput"></textarea>
		</div>
		
		<div class="form-group">
			<label for="authorInput">Author</label>
			<select class="form-control" name="author" id="authorInput">
				@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->username }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="catagoriesInput">Catagories</label>
			<select multiple class="form-control" name="catagories[]" id="catagoriesInput">
				@foreach($catagories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option> 
				@endforeach
			</select>
		</div>
		
		<div class="pull-right">
			<a href="{{ URL::action('AdminPostsController@index') }}" class="btn btn-default">Cancel</a>
			<button type="submit" class="btn btn-primary">Add</button>
		</div>
		
	{{ Form::close() }}

@stop
