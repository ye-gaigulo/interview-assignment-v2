@extends('layouts.master')

@section('title')
Projects API - Project Edit
@endsection

@section('content')

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Project</h3>
			</div>
			<div class="panel-body">
				<fieldset>
					{{ Form::open(array('url' => route('projects.update', $editProject['pk']), 'method' => 'put' )) }}
					<div class="form-group">
						{!! Form::label('title', 'Title') !!} <br>
						{!! Form::text('title', $editProject['title'], ['class' => 'form-control'] ) !!}
					</div>
					<div class="form-group">
						{!! Form::label('description', 'Description') !!} <br>
						{!! Form::text('description', $editProject['description'], ['class' => 'form-control'] ) !!}
					</div>
					<div class="form-group">
						{!! Form::label('start_date', 'Starting Date') !!} <br>
						{!! Form::date('start_date', $editProject['start_date']) !!}
					</div>
					<!-- CHECKBOX TO INDICATE THAT THERE IS NO END DATE, INSERT BLANK VALUE TO FIELD, CANNOT ACCEPT NULL -->
					<div class="form-group">
						{!! Form::label('end_date', 'Closing Date') !!} <br>
						@if($editProject['end_date'] == null)
							{!! Form::date('end_date') !!}<br>
							{!! Form::checkbox('no_end_date', 1, true) !!} <i>Closing date not specified</i>
						@else
							{!! Form::date('end_date', $editProject['end_date']) !!}<br>
							{!! Form::checkbox('no_end_date', 1, false) !!} <i>Closing date not specified</i>
						@endif
					</div>
					<div class="form-group">
						{!! Form::label('is_billable', 'Billable') !!}
						{!! Form::select('is_billable', array('true' => 'true', 'false' => 'false'), $editProject['is_billable']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('is_active', 'Active') !!}
						{!! Form::select('is_active', array('true' => 'true', 'false' => 'false'), $editProject['is_active']) !!}
					</div>
					<div class="col-sm-3 col-sm-offset-8">
						<div class="form-group">
							{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
							{!! Form::close() !!}	
						</div>
					</div>
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


