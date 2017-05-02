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
			<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/public/photo/<?php echo $userprofile->imagename?>" width="200px" height="200px" class="img-responsive"> </div>
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
						<!--Pledge History-->
	<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Pledge History</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach ($pledgeprojects as $pledgeproject)
			<li class="list-group-item">
			Pledged <a href="projects/<?php echo$pledgeproject->pid?>"><strong>{{$pledgeproject->pname}}</strong></a>

			amount: {{$pledgeproject->amount}} 
			

			@if(($pledgeproject->transaction_status) == 'posted' && $pledgeproject->status == 'finished')
			<a class="btn btn-success btn-xs" href="projects/<?php echo$pledgeproject->pid?>/rate">Rate</a>
			@endif

			</li>
		@endforeach
		</ul>
	</div>
	</div>
	
							<!--created project and show rating-->
	<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Created Projects</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach ($createdprojects as $createdproject)
			<li class="list-group-item">
			<a href="projects/<?php echo$createdproject->pid?>"><strong>{{$createdproject->pname}}</strong></a>

			raised money: {{$createdproject->raisedmoney}} 
			@foreach($avg_ratings as $avg_rating)
				@if($avg_rating->project_pid == $createdproject->pid)
					<div class="row">
					<div class="col-sm-3">
						<div class="rating-block">
							<h5>Average user rating</h5>
								@if($avg_rating->average_rates > 0 && $avg_rating->average_rates <= 1)
									@include('projects.showrating1')
								@endif
								@if($avg_rating->average_rates > 1 && $avg_rating->average_rates <= 2)
									@include('projects.showrating2')
								@endif
								@if($avg_rating->average_rates > 2 && $avg_rating->average_rates <= 3)
									@include('projects.showrating3')
								@endif
								@if($avg_rating->average_rates > 3 && $avg_rating->average_rates <= 4)
									@include('projects.showrating4')
								@endif
								@if($avg_rating->average_rates > 4 && $avg_rating->average_rates <= 5)
									@include('projects.showrating5')
								@endif
							<h5 class="bold padding-bottom-7"><?php echo number_format($avg_rating->average_rates, 1, '.', ',')?> <small>/ 5</small></h5>
						</div>
					</div>
					</div>
				@endif
			@endforeach
			
			
			</li>
		@endforeach
		</ul>
	</div>
	</div>

</div>
@endsection