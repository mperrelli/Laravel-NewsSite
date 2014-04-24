<?php

class Comment extends \Eloquent {
	
	protected $fillable;
	
	protected $table = 'comments';
	
	public function post()
	{
		return $this->belongsTo('Post');
	}
}