<?php 

use Spgallery\Repositories\User\RepositoryInterface as User;

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = new Spgallery\Service\Validation\User;

		if($v->passes()) {
			$username = Input::get('username');
			$email = Input::get('email');
			$password = Hash::make(Input::get('password'));
			$input = ['username' => $username, 'email' => $email, 'password' => $password, 'role_id' => 2];
			$this->user->create($input);

			return Redirect::action('PagesController@index')->with('flash_message','You are now registered! Please login');
			
			//dd($input);

		} else {
			return Redirect::back()->withInput()->withErrors($v->getErrors());
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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