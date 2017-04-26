@extends('layouts.app')
	@section('content')
	
		<div class="span4 offset4">
			<p class="lead">{{$creater->name}}'s Profile</p>

			<div class="row">
				<div class="span4 well">
					<div class="row">
						<div class="span3">
							<h3>{{$creater->name}} </h3> 
							<p>ProjectsNumber:{{$projects_count}}</p>
							<p>Followers:{{$followers}}</p>
							@if ( Auth::user() && ($following == false))
								{!!Form::open(['action'=>'OthersController@follow'])!!}
								
								{!!Form::token()!!}
								<input type="hidden" name="id" id="postvalue" value="{{$creater->id}}" />
								<div class="form-group">
									<button type="sumbit" class="btn btn-primary">Follow</button>
								</div>								
								{!!Form::close()!!}
								@include('errors.list')
							@endif
							
							@if ( Auth::user() && ($following == true))
								{!!Form::open(['action'=>'OthersController@unfollow'])!!}
								
								{!!Form::token()!!}
								<input type="hidden" name="id" id="postvalue" value="{{$creater->id}}" />
								<div class="form-group">
									<button type="sumbit" class="btn btn-primary">UnFollow</button>
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