<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BlogSite - Admin Panel</title>

		<!-- Bootstrap -->
		{{ HTML::style('dist/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('theme/default/master.css') }}
		{{ HTML::style('theme/default/admin.css') }}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		@yield('head')
		
	</head>
	<body>
		
		@include('layouts.admin.nav')
		
		<div class="container">
			
			<div class="blog-header">
				<h1 class="blog-title">BlogSite</h1>
				<p class="lead blog-description">
					We write about cool things here.
				</p>
			</div>
			
			<div class="row">
				
				<div class="col-sm-12 admin-container">
					
					@if(!$errors->isEmpty())
						<div class="alert alert-danger">		
							@foreach ($errors->all() as $message)
							
								{{ $message }}<br />
							    
							@endforeach		
						</div>
					@endif
		
					@yield('content')
				
				</div>
		
      		</div>

    	</div>

    	<div class="blog-footer">
      		<p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      		<p>
        		<a href="#">Back to top</a>
      		</p>
    	</div>
		
		
		@yield('foot')
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		{{ HTML::script('dist/bootstrap/js/bootstrap.min.js') }}
	</body>
</html>