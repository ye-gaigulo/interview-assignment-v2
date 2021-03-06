@extends('layouts.master')

@section('title')
Projects API - Projects Intro
@endsection

@section('content')
	<div class="jumbotron">
		<h1>Project Management</h1>
			<p>This is a web interface for managing projects, as the administrator you will have full access to create, edit, delete and update any projects.</p>
			<p><a class="btn btn-lg btn-primary" href="{{route('projects.index')}}" role="button">View projects »</a></p>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">		
			@if(count($log) > 0)
				<div class="alert alert-success">
					{{ $log['message'] }}
				</div>
			@endif
		</div>
	</div>
@endsection

@section('footer')


@endsection


