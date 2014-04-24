<?php

namespace Blogsite\Composers;

use Blogsite\Repositories\PostRepositoryInterface;

class SidebarComposer {
	
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
		$links = $this->post->getArchive();
	
		$view->with('links', $links);
	}
}
