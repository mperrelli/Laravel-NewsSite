<div class="sidebar-module">
	<h4>Archives</h4>
	<ol class="list-unstyled">
		@foreach($links as $link)
  			<li><a href="{{ URL::action('PostsController@viewByDate', [$link->year, $link->month]) }}">{{ $link->month_name }} {{ $link->year }} ({{ $link->post_count }})</a></li>
  		@endforeach
	</ol>
</div>