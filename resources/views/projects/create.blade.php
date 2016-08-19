@extends('layouts.master')

@section('title')
Projects API - Project Create
@endsection

@section('content')
	<div class="col-md-6">
	{{ Form::open(array('url' => route('projects.store'))) }}
		<div class="form-group">
			{!! Form::label('title', 'Title') !!} <br>
			{!! Form::text('title', null, ['class' => 'form-control'] ) !!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description') !!} <br>
			{!! Form::text('description', null, ['class' => 'form-control'] ) !!}
		</div>
		<div class="form-group">
			{!! Form::label('start_date', 'Starting Date') !!} <br>
			{!! Form::date('start_date', \Carbon\Carbon::now()) !!}
		</div>
		<!-- CHECKBOX TO INDICATE THAT THERE IS NO END DATE, INSERT BLANK VALUE TO FIELD, CANNOT ACCEPT NULL -->
		<div class="form-group">
			{!! Form::label('end_date', 'Closing Date') !!} <br>
			{!! Form::date('end_date', \Carbon\Carbon::now()) !!}
		</div>
		<div class="form-group">
			{!! Form::label('is_billable', 'Billable') !!}
			{!! Form::select('is_billable', array('true' => 'true', 'false' => 'false'), 'true') !!}
		</div>
		<div class="form-group">
			{!! Form::label('is_active', 'Active') !!}
			{!! Form::select('is_active', array('true' => 'true', 'false' => 'false'), 'true') !!}
		</div>
		<div class="col-sm-9">

		</div>
		<div class="col-sm-3">
			<div class="form-group">
				{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
				{!! Form::close() !!}	
			</div>
		</div>
	</div>
@endsection

@section('footer')

@endsection



