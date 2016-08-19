@extends('layouts.master')

@section('title')
Projects API - Login
@endsection

@section('content')
	{!! Form::open(array('url' => route('login') )) !!}
	{!! Form::hidden('user_service', 'http://userservice.staging.tangentmicroservices.com:80/api-token-auth/', ['class' => 'form-control']) !!}
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'password']) !!}
                            </div>
                                {!! Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-block']) !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
<!--

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

	
{!! Form::close() !!} -->
@endsection

@section('footer')


@endsection
