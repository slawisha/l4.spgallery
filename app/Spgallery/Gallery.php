<?php namespace Spgallery;


class Gallery extends \Eloquent{
	
	protected $table = "gallery";

	public function user()
	{
		return $this->belongTo('Spgallery\User');
	}

	public function photos()
	{
		return $this->hasMany('Spgallery\Photo');
	}
}