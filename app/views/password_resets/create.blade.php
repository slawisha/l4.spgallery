@extends('layouts.master')

@section('content')
	<h3>Reset password</h3>
	{{ Form::open(array('method'=>'post','route'=>'password_resets.store')) }}
	<div class="form-group">
	{{ Form::label('email', 'Email Address') }}
	{{ Form::text('email')}}
	<span class="alert-danger">{{ $errors->first('email') }}</span>
	</div>
	<div class="form-group">
	{{ Form::submit('Reset', array('class'=>'btn btn-primary submit'))}}
	</div>
	{{ Form::close() }}

	@if ( Session::has('error') )
		<p> {{ Session::get('reason') }} </p>
	@elseif ( Session::get('success') )
		<p>Please check your email</p>
	@endif
@stop