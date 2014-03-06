<?php

class PasswordResetsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('password_resets.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('password_resets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = new Spgallery\Service\Validation\PasswordReset;

		if( $v->passes()){

			Password::remind(['email'=>Input::get('email')], function($message){

					$message->subject("Your Password reset");

				});

			return Redirect::route('password_resets.create')->withSuccess(true);

		} else {

			return Redirect::back()->withInput()->withErrors($v->getErrors());

		}
	}

	public function reset($token)
	{
		return View::make('password_resets.reset')->withToken($token);
	}

	public function postReset()
	{ 

		$credentials = [
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		];

		return Password::reset($credentials, function($user,$password){

			$user->password = Hash::make($password);

			$user->save();

			return Redirect::route('login');
		});


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('password_resets.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('password_resets.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
