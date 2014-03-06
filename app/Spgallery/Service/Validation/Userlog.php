<?php namespace Spgallery\Service\Validation;

class Userlog extends Validator{

	public static $rules = array(
			'email' => 'required|email',
			'password' => 'required',
		);
}