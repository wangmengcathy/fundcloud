@extends('layouts.app')

@section('content')
	<h1>Rate:{!! $project->pname !!}</h1>
	<hr/>
	
	
	<!--projects presentation-->
	
	
	
	{!!Form::open(['action'=>'RateController@store'])!!}
	
	
	<div class="form-group">
		{!!Form::label('rating','Rating:')!!}
		{!!Form::select('rating',['1','2','3','4','5'], ['class'=>'form-control'])!!}
		{!!Form::hidden('user_id', $user->id)!!}
		{!!Form::hidden('project_pid', $project->pid)!!}
	</div>	
	<div>
		{!!Form::submit('Submit',['class' => 'btn btn-primary form-control'])!!}
	</div>
		
	{!!Form::close()!!}
	
	@include('errors.list')
@stop