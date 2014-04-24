<div class="blog-post">
	<h2 class="blog-post-title"><a href="{{ URL::action('PostsController@show', $post->id) }}">{{{ $post->title }}}</a></h2>
	<p class="blog-post-meta">{{ date("d F Y",strtotime($post->created_at)) }} at {{ date("g:h a",strtotime($post->created_at)) }} by <a href="#">{{ $post->user->username }}</a>
		<span class="pull-right">
			@foreach($post->categories as $category)
				{{ $category->name }}&nbsp; 
			@endforeach
		</span>
	</p>
	<p>
		@if(Request::is('posts/*') || Request::is('admin/*'))
			{{{ $post->body }}}
		@else
			{{{ substr(stripslashes($post->body) , 0, 300) }}}...   <a href="{{ URL::action('PostsController@show', $post->id) }}">Read more</a><br /><br />
			<a href="{{ URL::action('PostsController@show', $post->id) }}"><small>{{ count($post->comments) }} comment(s)</small></a>
		@endif
	</p>
	
	<hr>
	
</div>