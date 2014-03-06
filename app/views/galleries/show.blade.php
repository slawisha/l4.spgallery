@extends('layouts.colorbox')

@section('content')
	<h3>{{ $gallery->name}}</h3>
	<p>{{$gallery->description}}</p>

	@foreach ($images as $image)
	<a href="{{$image->uri}}" class="gallery-image"><img src="{{$image->uri}}" width="150" height="150" class="img-thumbnail" /></a>

	@endforeach
	
@stop