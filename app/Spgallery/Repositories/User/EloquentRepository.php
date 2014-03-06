<?php namespace Spgallery\Repositories\User;

use Spgallery\User as User;

class EloquentRepository implements RepositoryInterface{

	public function all()
	{
		return User::all();
	}

	public function find($id)
	{
		return User::find($id);
	}

	public function create($input)
	{
		$user = new User;

		foreach ($input as $key => $value) {
			$user->$key = $value;
		}

		$user->save();
	}

	public function update($id, $input)
	{
		$user = User::find($id);

		foreach ($input as $key => $value) {
			$user->$key = $value;
		}

		$user->save();
	}

	public function delete($id)
	{
		$user = User::find($id);

		$user->delete();
	}

}