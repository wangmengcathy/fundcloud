@extends('layouts.app')

@section('content')
	<h1>Rate:{!! $project->pname !!}</h1>
	<hr/>
	
	
	<!--projects presentation-->
	<div>
		@include('projects.sample')
	</div>
	
	
	{!!Form::open(['action'=>'RateController@store'])!!}
	
	
	<div class="form-group col-sm-9"; style="padding-top:20px;">
		{!!Form::label('rating','Rating:')!!}
		{!!Form::selectRange('rating', 0, 5)!!}
		<br/>
		{!!Form::label('rate_content','Description:')!!}
		{!!Form::textarea('rate_content',null,['class'=>'form-control'])!!}
		{!!Form::hidden('user_id', $user->id)!!}
		{!!Form::hidden('project_pid', $project->pid)!!}
	</div>	
	<div>
		{!!Form::submit('Submit',['class' => 'btn btn-primary form-control'])!!}
	</div>
		
	{!!Form::close()!!}
	
	@include('errors.list')
@stop