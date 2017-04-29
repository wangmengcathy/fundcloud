

@extends('app')

@section('content')
	<h1>Pledge a project</h1>
	<hr/>
	{!!Form::open(array('action' => array('ProjectController@pledgestore')))!!}
		
	<div class="form-group">
		{!!Form::label('amount','Pledge Money:')!!}
		{!!Form::number('amount', 0)!!}
		{!!Form::hidden('id', $id)!!}
	</div>
<!-- 	<div class="form-group"> -->
<!-- 		{!!Form::label('id','ProjectId:')!!} -->
<!-- 		{!!Form::text('id', $id)!!} -->
<!-- 	</div> -->
	<div>
		{!!Form::submit('pledge',['class' => 'btn btn-primary form-control'])!!}
	</div>
	{!!Form::close()!!}
	
	@include('errors.list')
@stop