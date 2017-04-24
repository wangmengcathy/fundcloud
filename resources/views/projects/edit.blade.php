@extends('layouts.app')

@section('content')
	<h1>Edit:{!! $project->pname !!}</h1>
	<hr/>
	
	{!!Form::model($project, ['method'=>'PATCH', 'action'=>['ProjectController@update', $project->pid]])!!}
			@include('projects.form',['submitButtonText'=>'Update Article'])	
		
	{!!Form::close()!!}
	
	@include('errors.list')
@stop