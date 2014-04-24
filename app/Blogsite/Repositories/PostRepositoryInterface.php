<?php

namespace Blogsite\Repositories;

interface PostRepositoryInterface {
	
	public function getAllInOrder();
	
	public function getById($id);
	
	public function getByYearAndMonth($year, $month);
	
	public function getByCategory($category);
	
	public function storeWithInput($title, $body, $authorId, $categories);
	
	public function updateWithInput($postId, $title, $body, $authorId, $categories);
	
	public function deleteById($postId);
	
	public function getAllCategories();
	
	public function getArchive();
}