<?php

namespace Blogsite\Composers;

use Blogsite\Repositories\PostRepositoryInterface;

class NavbarComposer {
	
	/**
	 * @var Blogsite\Repositories\DbPostRepository
	 */
	protected $post;
	
	public function __construct(PostRepositoryInterface $post)
	{
		$this->post = $post;
	}
	
	public function compose($view)
	{
		$links = $this->post->getAllCategories();
	
		$view->with('links', $links);
	}
}
