<?php namespace Spgallery\Service\Validation;

class PasswordReset extends Validator{

	public static $rules = [
		'email' => 'required|email'
	];
}