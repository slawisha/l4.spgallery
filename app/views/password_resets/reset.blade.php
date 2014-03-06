@extends('layouts.master')

@section('content')
	<h3>Reset your password now</h3>
	{{ Form::open() }}
	{{ Form::hidden('token', $token) }}
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
	{{ Form::submit('Create new password', array('class'=>'btn btn-primary submit'))}}
	</div>
	{{ Form::close() }}

	@if ( Session::has('error') )
		<p>{{ Session::get('reason') }} 
	@endif
@stop