<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
			@foreach($links as $link)
				<a class="blog-nav-item {{ Request::is('category/' . $link->name) ? 'active' : '' }}" href="{{ URL::action('PostsController@viewByCategory', $link->name) }}">{{$link->name}}</a>
			@endforeach
			
			@if(!Auth::check())
				<a class="blog-nav-item pull-right {{ Request::is('login') ? 'active' : '' }}" href="{{ URL::action('SessionsController@create') }}">Login</a>
			@else
				<a class="blog-nav-item pull-right" href="{{ URL::action('AdminPostsController@index') }}">Admin Panel</a>
				<a class="blog-nav-item pull-right" href="{{ URL::action('SessionsController@destroy') }}">Logout</a>
			@endif
		</nav>
	</div>
</div>