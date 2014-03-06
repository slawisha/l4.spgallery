<?php namespace Spgallery\Repositories;

use Illuminate\Support\ServiceProvider;

/*
* Used to bind Repositories
* Make sure to add this class to app\config\app.php inside providers array
 */

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
				'Spgallery\Repositories\User\RepositoryInterface',
				'Spgallery\Repositories\User\EloquentRepository'
			);

		$this->app->bind(
				'Spgallery\Repositories\Gallery\RepositoryInterface',
				'Spgallery\Repositories\Gallery\EloquentRepository'
			);

		$this->app->bind(
				'Spgallery\Repositories\Photo\RepositoryInterface',
				'Spgallery\Repositories\Photo\EloquentRepository'
			);
	}
}
