@extends('layouts.default')

@section('content')

	<div class="col-sm-8 blog-main">
		
			@include('posts.post_template')
			
			{{ count($post->comments) }} comment(s)
			<hr>
			
			@if(!$errors->isEmpty())
				<div class="alert alert-danger">		
					@foreach ($errors->all() as $message)
					
						{{ $message }}<br />
					    
					@endforeach		
				</div>
			@endif
					
			{{ Form::open(['url' => URL::action('CommentsController@store'), 'method' => 'post', 'class' => 'form-horizontal']) }}
			<div class="comment-module comment-module-inset">
				
				@if(!Auth::check())
					<div class="form-group">
						<label for="nameInput" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="name" name="name" class="form-control" id="nameInput">
						</div>
					</div>
				@else
					<input type="hidden" name="name" value="{{ Auth::user()->username }}">
				@endif
				
				<div class="form-group">
					<label for="messageInput" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="message" rows="2" id="messageInput"></textarea>
					</div>
				</div>
				
				@if(!Auth::check())
					<div class="form-group">
						<label for="captchaInput" class="col-sm-2 control-label">{{ HTML::image(Captcha::img(), 'Captcha image') }}</label>
						<div class="col-sm-10">
							<input type="captcha" name="captcha" class="form-control" id="nameInput">
						</div>
					</div>
				@endif
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary pull-right">
							Comment
						</button>
					</div>
				</div>
			
			</div>
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			{{ Form::close() }}
			
			@foreach($post->comments as $comment)
			<div class="comment-module comment-module-inset">
				<h4>{{{ $comment->name }}} - <small>{{ date("d F Y",strtotime($comment->created_at)) }} at {{ date("g:h a",strtotime($comment->created_at)) }}</small></h4>
				<p>
					<em>{{{ $comment->body }}}</em>	
				</p>
			</div>
			@endforeach
	
	</div>

@stop
