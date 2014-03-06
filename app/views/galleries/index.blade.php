@extends('layouts.master')

@section('content')
	<h2>Welcome {{Auth::user()->username}}</h2>
	<h3>Your Galleries</h3>
	{{ HTML::linkRoute('galleries.create','Add new gallery')}}
	<table class="table-striped">
		<tr><th>Name</th><th>Desription</th><th>Action</th></tr>
		@foreach ($galleries as $gallery)
		<tr>
			<td>{{HTML::linkRoute('galleries.show', $gallery->name, [$gallery->id])}}</td>
			<td>{{$gallery->description}}</td>
			<td>
				{{ Form::open(['method'=>'delete', 'route'=>['galleries.destroy', $gallery->id], 'class'=>'delete']) }}	
				<button type="submit" class="delete"><i class="fa fa-trash-o"></i> </button>
				{{ Form::close()}}
				{{ HTML::decode(HTML::linkRoute('galleries.edit', '<i class="fa fa-edit fa fa-2x"></i> ', [$gallery->id], ['class'=>'edit']))}}
			</td>
		</tr>
		@endforeach
	</table>
@stop