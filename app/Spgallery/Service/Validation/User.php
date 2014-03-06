<?php namespace Spgallery\Service\Validation;

class User extends Validator{

	public static $rules = array(
			'username' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required'
		);
}