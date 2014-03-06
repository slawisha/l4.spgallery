<?php namespace Spgallery;

class Role extends \Eloquent{

	public function users()
	{
		return $this->hasMany('Spgallery\User');
	}
}