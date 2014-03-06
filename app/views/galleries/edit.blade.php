@extends('layouts.master')

@section('content')
	<div class="row">
				<div class="main col-md-6">
					<h3>Edit Gallery</h3>
					{{ Form::open(['method'=>'PATCH', 'route'=>['galleries.update', $gallery->id], 'files' => true, 'role'=>'form'])}}
					<div class="form-group">
					{{ Form::label('name','Gallery Name') }}
					{{ Form::text('name',$gallery->name) }}
					<span class="alert-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="form-group">
					{{ Form::label('description','Gallery Desription') }}
					{{ Form::textarea('description', $gallery->description) }}
					<span class="alert-danger">{{ $errors->first('description') }}</span>
					</div>
					<div class="form-group">
					{{ Form::label('images','Upload Images') }}
					{{ Form::file('images', array('name' => 'file_upload', 'id'=>"edit_file_upload")) }}
					<span class="alert-danger">{{ $errors->first('images') }}</span>
					</div>
					<div class="form-group">
					{{ Form::submit('Submit', array('class'=>'btn btn-primary submit'))}}
					</div>
					{{ Form::close()}}
				</div>
				<aside class="col-md-6">
					<ul class="image-list">
					@foreach ($images as $image)
					<li>
					<img src="{{$image->uri}}" width="150" height="150" class="img-thumbnail" alt="{{ $image->id }}" />
					<span class="delete-image">X</span>
					</li>
					@endforeach
					</ul>
				</aside>
			</div>		
	
@stop