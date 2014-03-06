<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.index');
	}

	public function login()
	{
		return View::make('pages.login');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::action('PagesController@index')->with('flash_message','You are now logged out');
	}

	public function authenticate()
	{
		//validation
		$v = new Spgallery\Service\Validation\Userlog;

		if ($v->passes()){
		//check authentication
			$credentials = ['email'=>Input::get('email'), 'password'=>Input::get('password')];
			if(Auth::attempt($credentials)){
				return Redirect::route('galleries.index')->with('flash_message','You have been logged in succesufuly');
			} else {
				return Redirect::action('PagesController@login')->with('flash_message','Invalid credentials');
			}

		} else {
			return Redirect::back()->withInput()->withErrors($v->getErrors());
		}

		
	}

}