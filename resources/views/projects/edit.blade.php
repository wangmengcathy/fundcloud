@extends('layouts.app')

@section('content')
	<h1>Edit:{!! $project->pname !!}</h1>
	<hr/>
	
	{!!Form::model($project, ['files'=>true, 'method'=>'PATCH', 'action'=>['ProjectController@update',  $project->pid]])!!}
	<!-- @foreach($samples as $sample)
		@if($sample->sample1 == null)
			{!!Form::file('editprojectsample1')!!}
		@endif
		@if($sample->sample2 == null)
			{!!Form::file('editprojectsample2')!!}
		@endif
		@if($sample->sample3 == null)
			{!!Form::file('editprojectsample3')!!}
		@endif
	@endforeach -->
			@include('projects.form',['submitButtonText'=>'Update Article'])	
		
	{!!Form::close()!!}
	
	@include('errors.list')
@stop