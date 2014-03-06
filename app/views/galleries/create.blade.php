@extends('layouts.master')

@section('content')
	<h3>Gallery creation</h3>
	{{ Form::open(['method'=>'POST', 'route'=>'galleries.store', 'files' => true, 'role'=>'form'])}}
	<div class="form-group">
	{{ Form::label('name','Gallery Name') }}
	{{ Form::text('name') }}
	<span class="alert-danger">{{ $errors->first('name') }}</span>
	</div>
	<div class="form-group">
	{{ Form::label('description','Gallery Desription') }}
	{{ Form::textarea('description') }}
	<span class="alert-danger">{{ $errors->first('description') }}</span>
	</div>
	<div class="form-group">
	{{ Form::label('images','Upload Images') }}
	{{ Form::file('images', array('name' => 'file_upload', 'id'=>"file_upload")) }}
	<span class="alert-danger">{{ $errors->first('images') }}</span>
	</div>
	<div class="form-group">
	{{ Form::submit('Submit', array('class'=>'btn btn-primary submit'))}}
	</div>
	{{ Form::close()}}
@stop