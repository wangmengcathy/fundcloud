@extends('layouts.app')

@section('content')
	<h1>Post a new project</h1>
	<hr/>
		
	{!!Form::open(['url'=>'projects'])!!}
		@include('projects.form', ['submitButtonText'=>'Add Project'])
			
	{!!Form::close()!!}
	
	@include('errors.list')
@stop