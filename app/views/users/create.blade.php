@extends('layouts.master')

@section('content')
	<h3>Register</h3>
	{{ Form::open(array('method'=>'post','route'=>'users.store')) }}
	<div class="form-group">
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username')}}
	<span class="alert-danger">{{ $errors->first('username') }}</span>
	</div>
	<div class="form-group">
	{{ Form::label('email', 'Email Address') }}
	{{ Form::text('email')}}
	<span class="alert-danger">{{ $errors->first('email') }}</span>
	</div>
	<div class="form-group">
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password')}}
	<span class="alert-danger">{{ $errors->first('password') }}</span>
	</div>
	<div class="form-group">
	{{ Form::label('password_confirmation', 'Confirm Password') }}
	{{ Form::password('password_confirmation')}}
	<span class="alert-danger">{{ $errors->first('password_confirmation') }}</span>
	</div>
	<div class="form-group">
	{{ Form::submit('Register', array('class'=>'btn btn-primary submit'))}}
	</div>
	{{ Form::close() }}
@stop