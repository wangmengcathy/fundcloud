@extends('layouts.app')

@section('content')
	<h1>Post new files for project: {!! $project->pname !!}</h1>
	<hr/>
	
	{!!Form::open(['url'=>'posting','files'=>true])!!}
	<div class="form-group">
		{!!Form::label('posting_desp','Description:')!!}
		{!!Form::textarea('posting_desp',null,['class'=>'form-control'])!!}
	</div>
	<input type="hidden" name="project_pid" id="postvalue" value="{{$project->pid}}" />
	<div style="padding-top: 20px; padding-bottom: 20px;">
		<strong>Upload image</strong>{!!Form::file('posting1')!!} 
	</div>
	<div style="padding-top: 20px; padding-bottom: 20px;">
		<strong>Upload audio</strong>{!!Form::file('audio1')!!} 
	</div>
	<div style="padding-top: 20px; padding-bottom: 20px;">
		<strong>Upload video</strong>{!!Form::file('video1')!!} 
	</div>
	{!!Form::submit('Post',['class' => 'btn btn-primary form-control'])!!}
	{!!Form::close()!!}
	@include('errors.list')
@stop