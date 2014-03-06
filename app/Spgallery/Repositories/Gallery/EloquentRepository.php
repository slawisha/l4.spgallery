<?php namespace Spgallery\Repositories\Gallery;

use Spgallery\Gallery as Gallery;

class EloquentRepository implements RepositoryInterface{

	public function all()
	{
		return Gallery::all();
	}

	public function find($id)
	{
		return Gallery::find($id);
	}

	public function create($input)
	{
		$gallery = new Gallery;

		foreach ($input as $key => $value) {
			$gallery->$key = $value;
		}

		$gallery->save();

	}

	public function update($id, $input)
	{
		$gallery = Gallery::find($id);

		foreach ($input as $key => $value) {
			$gallery->$key = $value;
		}

		$gallery->save();
	}

	
	public function delete($id)
	{
		Gallery::find($id)->delete();
	}

	/**
	 * gets the id of the last added or updated Gallery
	 * @return int 
	 */
	public function findLastUpdatedId()
	{
		$lastGallery = Gallery::orderBy('updated_at', 'desc')->first();
		return $lastGallery->id;
	}

	public function findGalleryImages($id)
	{
		return Gallery::find($id)->photos;
		
	}


}