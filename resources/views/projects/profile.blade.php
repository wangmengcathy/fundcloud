@extends('layouts.app')

@section('content')
<div class="containers">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1 id = "head">{{$user->name}}'s Profile</h1>
	<hr/>
	<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">{{$user->name}}</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
			<div class=" col-md-9 col-lg-9 "> 
				<table class="table table-user-information">
					<tbody>
						<tr>
							<td>Hometown:</td>
							<td>{{$userprofile->hometown}}</td>
						</tr>
						<tr>
							<td>Date of Birth:</td>
							<td>{{Carbon\Carbon::parse($userprofile->birthday)->format('m-d-Y')}}</td>
						</tr>
						<tr>
							<td>Interest</td>
							<td>{{$userprofile->interest}}</td>
						</tr>
				 
						<tr>

							<td>Credit Card</td>
							<td>{{$userprofile->creditcard}}</td>
						</tr>
							<tr>
							<td>Legal Name</td>
							<td>{{$userprofile->legalname}}</td>
						</tr>
								 
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Pledge History</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach ($pledgeprojects as $pledgeproject)
			<li class="list-group-item">
			Pledged <strong>{{$pledgeproject->pname}}</strong>

			amount: {{$pledgeproject->amount}} 
			
			@if(($pledgeproject->transaction_status) == 'posted')
			<a class="btn btn-success btn-xs" href="#">Rate</a>
			@endif
			</li>
		@endforeach
		</ul>
	</div>
	</div>
	
	
	<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Created Projects</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach ($createdprojects as $createdproject)
			<li class="list-group-item">
			<strong>{{$createdproject->pname}}</strong>

			raised money: {{$createdproject->raisedmoney}} 
			
			@include('projects.showrating')
			
			</li>
		@endforeach
		</ul>
	</div>
	</div>

</div>
@endsection