@extends('layouts.app')
	@section('content')
		
		<div class="span4 offset4">
			<div class="row">
				<div class="span4 well">
					<div class="row">
						<div class="span3">
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
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	@endsection
	
	