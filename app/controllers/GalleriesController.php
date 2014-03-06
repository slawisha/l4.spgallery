<?php 

use Spgallery\Repositories\Gallery\RepositoryInterface as Gallery;
use Spgallery\Repositories\Photo\RepositoryInterface as Photo;

class GalleriesController extends \BaseController {

	protected $gallery;
	protected $photo;

	public function __construct(Gallery $gallery, Photo $photo)
	{
		$this->gallery = $gallery;
		$this->photo = $photo;
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = $this->gallery->all();

		return View::make('galleries.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('galleries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//where uploadify uploads all images (this was set in uploadify.php)
		$uploads = public_path() . '\uploads';
		//where to move uploaded images
		$destination = public_path() . '\gal\\' . Auth::user()->username . '\\'   . Input::get('name') .'\\' ; 
		
		moveUploadedImages($uploads, $destination);

		//save the gallery
		$input = array('name'=>Input::get('name'), 'description'=>Input::get('description'),'user_id'=>Auth::user()->id);
		$this->gallery->create($input);
		//find the id id of the last created gallery
		$gallery_id = $this->gallery->findLastUpdatedId();
		//save images to database
		if(is_dir($destination)){
			$images = scandir($destination);

			$gallery_path = URL::to('/').'/gal/' . Auth::user()->username . '/'   . Input::get('name') .'/' ;
			foreach ($images as $image) {
				if($image != '.' && $image!= '..'){
				$input = array('name'=>$image, 'uri'=> $gallery_path .  $image, 'gallery_id'=> $gallery_id ) ;
				$this->photo->create($input);
			   }
			}
		}

		return Redirect::route('galleries.index')->with('flash_message', 'Gallery created succesufuly');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gallery = $this->gallery->find($id);
		$images = $this->gallery->findGalleryImages($id);
		return View::make('galleries.show', compact('gallery','images'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = $this->gallery->find($id);
		$images = $this->gallery->findGalleryImages($id);
		return View::make('galleries.edit',compact('gallery','images'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//where uploadify uploads all images (this was set in uploadify.php)
		$uploads = public_path() . '\uploads';
		//where to move uploaded images
		$destination = public_path() . '\gal\\' . Auth::user()->username . '\\'   . Input::get('name') .'\\' ; 
		
		$movedImages = moveUploadedImages($uploads, $destination);

		//save the gallery
		$input = array('name'=>Input::get('name'), 'description'=>Input::get('description'),'user_id'=>Auth::user()->id);
		$this->gallery->update($id, $input);
		//find the id id of the last created gallery
		$gallery_id = $this->gallery->findLastUpdatedId();
		//save images to database
		if(is_dir($destination)){
			$images = scandir($destination);

			$gallery_path = URL::to('/').'/gal/' . Auth::user()->username . '/'   . Input::get('name') .'/' ;
			foreach ($images as $image) {
				if( $image != '.' && $image!= '..' && in_array($image, $movedImages) ){
				$input = array('name'=>$image, 'uri'=> $gallery_path .  $image, 'gallery_id'=> $gallery_id ) ;
				$this->photo->create($input);
			   }
			}
		}

		return Redirect::route('galleries.index')->with('flash_message', 'Gallery updated succesufuly');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//what if there are no images
		if( !is_null($this->gallery->find($id)->photos()->first()) ){
		$gallery_folder_url = dirname( $this->gallery->find($id)->photos()->first()->uri );

		$gallery_folder = galleryUrlToName($gallery_folder_url);

		//dd($gallery_folder);

		deleteDirectory($gallery_folder);
		}


		$this->gallery->delete($id);
		return Redirect::route('galleries.index')->with('flash_message','Gallery deleted');
	}

}