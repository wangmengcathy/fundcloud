@extends('layouts.app')
	@section('content')
		
	
					<div class="row">
		
							<h1 id = "head">{{$creater->name}}'s Profile</h1>
							<hr/>
							<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">{{$creater->name}}</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/public/photo/<?php echo $createrprofile->imagename?>" width="200px" height="200px" class="img-responsive"> </div>
									<div class=" col-md-9 col-lg-9 "> 
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td>Hometown:</td>
													<td>{{$createrprofile->hometown}}</td>
												</tr>
												<tr>
													<td>Date of Birth:</td>
													<td>{{Carbon\Carbon::parse($createrprofile->birthday)->format('m-d-Y')}}</td>
												</tr>
												<tr>
													<td>Interest</td>
													<td>{{$createrprofile->interest}}</td>
												</tr>
										 
												
												<tr>
													<td>Legal Name</td>
													<td>{{$createrprofile->legalname}}</td>
												</tr>
													
												<tr>
												<td>Project Number</td>
												<td>{{$projects_count}}</td>
												</tr>
												
												<tr>
												<td>Followers</td>
												<td>{{$followers}}</td>
												</tr>		 
											</tbody>
										</table>
									</div>
								</div>
							</div>
							</div>



							<!--Follow or Unfollow-->
							@if ( Auth::user() && ($following == false))
								{!!Form::open(['action'=>'OthersController@follow'])!!}
								
								{!!Form::token()!!}
								<input type="hidden" name="id" id="postvalue" value="{{$creater->id}}" />
								<div class="form-group">
									<center><button type="sumbit" class="btn btn-primary">Follow</button></center>
								</div>								
								{!!Form::close()!!}
								@include('errors.list')
							@endif
							
							@if ( Auth::user() && ($following == true))
								{!!Form::open(['action'=>'OthersController@unfollow'])!!}
								
								{!!Form::token()!!}
								<input type="hidden" name="id" id="postvalue" value="{{$creater->id}}" />
								<div class="form-group">
									<center><button type="sumbit" class="btn btn-primary">UnFollow</button></center>
								</div>
								{!!Form::close()!!}
								@include('errors.list')
							@endif
							



						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">{{$creater->name}}'s Projects</h3>
							</div>
							<div class="panel-body">
								<ul class="list-group">
									@foreach ($createdprojects as $createdproject)
										<li class="list-group-item">
										<a href="../../projects/<?php echo$createdproject->pid?>"><strong>{{$createdproject->pname}}</strong></a>

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
	
	