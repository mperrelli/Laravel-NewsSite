<?php

class Category extends \Eloquent {
	
	protected $fillable;
	
	protected $table = 'categories';
	
	public function posts()
	{
		return $this->belongsToMany('Post');
	}
	
}