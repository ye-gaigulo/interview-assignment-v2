@extends('layouts.master')

@section('title')
Projects API - Login
@endsection

@section('content')
{!! Form::open(array('url' => route('collect.auth') )) !!}

	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="col-sm-12">
				{!! Form::label('user_service', 'Web Service: ')!!}
				{!! Form::text('user_service', 'http://userservice.staging.tangentmicroservices.com:80/api-token-auth/', ['class' => 'form-control']) !!}
				
			</div>
		</div>
	</div>
	<div class="row top-margin">
		<div class="col-md-4 col-md-offset-3">
			<div class="col-sm-12">
				{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'username']) !!}
			</div>
			<div class="col-sm-12">
				{!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'password']) !!}
			</div>
			<div class="col-sm-3 top-margin">
				{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	</div>

	
{!! Form::close() !!}
@endsection

@section('footer')


@endsection
