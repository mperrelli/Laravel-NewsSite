@extends('layouts.default')

@section('content')

	<div class="col-sm-8 blog-main">
	
	{{ Form::open(['route' => 'sessions.store']) }}
		<div class="form-group">
			<label for="usernameInput">Username</label>
			<input type="text" name="username" class="form-control" id="usernameInput">
		</div>
		<div class="form-group">
			<label for="passwordInput">Password</label>
			<input type="password" name="password" class="form-control" id="passwordInput">
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="rememberMe">
				Remember me! 
			</label>
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	{{ Form::close() }}
	
	</div>

@stop