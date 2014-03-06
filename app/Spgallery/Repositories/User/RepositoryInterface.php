<?php namespace Spgallery\Repositories\User;

interface RepositoryInterface{

	public function all();

	public function find($id);
	
	public function create($input);

	public function update($id, $input);

	public function delete($id);
	 
}