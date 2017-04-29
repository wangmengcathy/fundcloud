@extends('layouts.app')

@section('content')
	<h1>Edit Profile</h1>
	<hr/>
		
	{!!Form::open(['action'=>'UserController@storeprofile','files'=>true])!!}
	<div class="form-group">
	<strong>Upload Avatars</strong> {!!Form::file('profileimage')!!}
	</div>
	<div class="form-group">
	{!!Form::label('hometown','Hometown:')!!}
	{!!Form::text('hometown',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('birthday','Date of Birth:')!!}
		{!!Form::input('date','birthday',date('Y-m-d'), ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('interest','Interest:')!!}
	{!!Form::text('interest',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('creditcard','Credit Card:')!!}
	{!!Form::number('creditcard',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('legalname','Legal Name:')!!}
	{!!Form::text('legalname',null,['class'=>'form-control'])!!}
	</div>
	<div>
		{!!Form::submit('Submit',['class' => 'btn btn-primary form-control'])!!}
	</div>
	{!!Form::close()!!}
	
	@include('errors.list')
@stop