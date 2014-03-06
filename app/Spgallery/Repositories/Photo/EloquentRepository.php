<?php namespace Spgallery\Repositories\Photo;

use Spgallery\Photo as Photo;

class EloquentRepository implements RepositoryInterface{

	public function all()
	{
		return Photo::all();
	}

	public function find($id)
	{
		return Photo::find($id);
	}

	public function create($input)
	{
		$photo = new Photo;

		foreach ($input as $key => $value) {

			$photo->$key = $value;
		}

		$photo->save();
	}

	public function update($id, $input)
	{
		$photo = Photo::find($id);

		foreach ($input as $key => $value) {

			$photo->$key = $value;
		}

		$photo->save();
	}

	public function delete($id)
	{
		Photo::find($id)->delete();
	}
}