@extends('layouts.master')

@section('title')
Projects API - Projects Index
@endsection

@section('content')
	<table id="projectsList" class="table table-striped table-bordered" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	        	<th>&nbsp;</th>
	            <th>PK</th>
	            <th>Title</th>
	            <th>Description</th>
	            <th>Start Date</th>
	            <th>End Date</th>
	            <th>Billable</th>
	            <th>Active</th>
	        </tr>
	    </thead>
	    <tbody>
		@foreach ($projectList as $projectIndex => $project)
			<tr>
			@foreach ($project as $key => $value)
				@if($key !== 'task_set' && $key !== 'resource_set')
					@if($key == 'pk')
						<td><input type="radio" name="selectedProject" value="{{$value}}"></td>
					@endif
					<td>{{$value}}</td>
				@endif
			@endforeach
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="col-md-12">
	    <div class="col-xs-4 col-offset-xs-8">
	    	<button type="button" id="edit" class="btn btn-primary">Edit</button>
	    	<button type="button" class="btn btn-danger">Delete</button>
	    </div>	
    </div>
@endsection

@section('footer')

@endsection


@section('scripts')
	<script type="text/javascript">

		jQuery(document).ready(function($){
			var projectIndex = [];

			projectIndex.edit = document.getElementById('edit');

			$(projectIndex.edit).click(function(){
				var projectIndex.cP = $('input[name=selectedProject]:checked').val();
				//conflict passing JS var to PHP blade, cannot use named route
				//route('projects.edit', ['projects' => cProject ])}}
				window.open("projects/"+projectIndex.cP+"/edit", "_self");
			});

		});
	</script>
@endsection



