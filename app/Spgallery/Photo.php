<?php namespace Spgallery;

class Photo extends \Eloquent{

	protected $table = "photos";

	public function gallery()
	{
		return $this->belongsTo('Spgallery\Gallery');
	}
}