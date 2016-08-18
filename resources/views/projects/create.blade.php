@extends('layouts.master')

@section('title')
Projects API - Projects Create
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
			{!! Form::date('start_date', \Carbon\Carbon::now()->subDays(147) ) !!}
		</div>
		<div class="form-group">
			{!! Form::label('end_date', 'Closing Date') !!} <br>
			{!! Form::date('end_date', \Carbon\Carbon::now()->addDays(58) ) !!}
		</div>
		<div class="form-group">
			{!! Form::label('billable', 'Billable') !!}
			{!! Form::selectRange('billable', 1, 2) !!}
		</div>
		<div class="form-group">
			{!! Form::label('active', 'Active') !!}
			{!! Form::selectRange('active', 1, 2) !!}
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



