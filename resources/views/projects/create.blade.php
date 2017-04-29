@extends('layouts.app')

@section('content')
	<h1>Post a new project</h1>
	<hr/>
		
	{!!Form::open(['url'=>'projects','files'=>true])!!}
	<strong>Upload files</strong>{!!Form::file('projectsample1')!!} {!!Form::file('projectsample2')!!}{!!Form::file('projectsample3')!!}
		@include('projects.form', ['submitButtonText'=>'Add Project'])
	{!!Form::close()!!}
	
	@include('errors.list')
@stop