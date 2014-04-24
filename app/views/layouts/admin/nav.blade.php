<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item" href="/">Back to site</a>
			<div class="divider-vertical"></div>
			<a class="blog-nav-item {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ URL::action('AdminPostsController@index') }}">Posts</a>
			<a class="blog-nav-item" href="">Users</a>
			<a class="blog-nav-item {{ Request::is('admin/comments') || Request::is('admin/comments/*') ? 'active' : '' }}" href="{{ URL::action('AdminCommentsController@index') }}">Comments</a>
			<a class="blog-nav-item" href="">Catagories</a>
			
			<div class="pull-right">
				@if(!Auth::check())
					<a class="blog-nav-item" href="{{ URL::action('SessionsController@create') }}">Login</a>
				@else
					<a class="blog-nav-item" href="{{ URL::action('SessionsController@destroy') }}">Logout</a>
				@endif
			</div>
		</nav>
	</div>
</div>