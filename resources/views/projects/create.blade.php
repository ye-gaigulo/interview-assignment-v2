@extends('layouts.master')

@section('title')
Projects API - Project Create
@endsection

@section('content')
	<div class="col-md-6">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li> {{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Create Project</h3>
			</div>
			<div class="panel-body">
				<fieldset>
					{{ Form::open(array('url' => route('projects.store'))) }}
						<div class="form-group">
							{!! Form::label('title', 'Title') !!} <br>
							{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Required'] ) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description', 'Description') !!} <br>
							{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Required'] ) !!}
						</div>
						<div class="form-group">
							{!! Form::label('start_date', 'Starting Date') !!}  <br>
							{!! Form::date('start_date', \Carbon\Carbon::now()) !!}
						</div>
						<!-- CHECKBOX TO INDICATE THAT THERE IS NO END DATE, INSERT BLANK VALUE TO FIELD, CANNOT ACCEPT NULL -->
						<div class="form-group">
							{!! Form::label('end_date', 'Closing Date') !!} <br>
							{!! Form::date('end_date', \Carbon\Carbon::now()) !!}<br>
							{!! Form::checkbox('no_end_date', 0) !!} <i>Closing date not specified</i>
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
							</div>
						</div>
					{!! Form::close() !!}
				</fieldset>		
			</div>
		</div>
	</div>
@endsection

@section('footer')

@endsection

@section('scripts')
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var projectForm = [];

			projectForm.noEndDate = document.getElementsByName("no_end_date");
			//projectCreate.endDate = document.getElementsByName("end_date");

			$(projectForm.noEndDate).click(function(){
				if(this.checked){
					$("#end_date").hide();
					//this.value = 1;
				}else{
					$("#end_date").show();
					//this.value = 0;
				}
			});

		});

	</script>
@endsection