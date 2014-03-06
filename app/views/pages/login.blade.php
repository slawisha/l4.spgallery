@extends('layouts.master')

@section('content')
	<h3>Log in</h3>
	{{ Form::open(array('method'=>'post','route'=>'authenticate')) }}
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
	{{ Form::submit('Login', array('class'=>'btn btn-primary submit'))}}
	{{link_to_route('password_resets.create','Forgot your password?')}}
	</div>

	{{ Form::close() }}
@stop