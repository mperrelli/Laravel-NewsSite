<?php

class Post extends \Eloquent {
	
	protected $fillable;
	
	protected $table = 'posts';
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function categories()
	{
		return $this->belongsToMany('Category');
	}
	
	public function comments()
	{
		return $this->hasMany('Comment');
	}
	
}