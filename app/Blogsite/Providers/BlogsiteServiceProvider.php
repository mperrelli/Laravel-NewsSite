<?php
namespace Blogsite\Providers;

use Illuminate\Support\ServiceProvider;

class BlogsiteServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$this->app->bind(
			'Blogsite\Repositories\PostRepositoryInterface', 
			'Blogsite\Repositories\DbPostRepository'
		);
	}
}
