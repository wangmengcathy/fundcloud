@extends('layouts.app')

	@section('content')
		<h1>{{$project->pname}}</h1>
		<p>
			End Time: {{$project->endtime->diffForHumans()}} <a class="btn" href="/projects/<?php echo $creater->id;?>/others">Created By:{{$creater->name}}</a>
		</p>
		
		<hr/>

		@unless($project->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($project->tags as $tag)
					<li>{{$tag->name}}</li>
				@endforeach
			</ul>
		@endunless

	<!-- 	*************************        Like    ****************************** -->

		<p>  
			{{$count}}
			@if (Auth::user() && $already_like == 0)
				{!!Form::open(['action'=>'LikeController@like'])!!}			
				{!!Form::token()!!}
				<input type="hidden" name="project_id" id="postvalue" value="{{$project->pid}}" />
					<button type="sumbit" style="all:none">
						<img src="http://www.stickylife.com/images/u/fc35d68ad835449f961625e7e31dbede-800.png" width = "20px" height = "20px">
					</button>
				{!!Form::close()!!}
				@include('errors.list')
			@endif

			@if (Auth::user() && $already_like > 0)
				{!!Form::open(['action'=>'LikeController@unlike'])!!}			
				{!!Form::token()!!}
				<input type="hidden" name="project_id" id="postvalue" value="{{$project->pid}}" />
					<button type="sumbit" style="all:none">
						<img src='https://s.w.org/images/core/emoji/2.2.1/svg/2764.svg' width = "20px" height = "20px">
					</button>

				{!!Form::close()!!}
				@include('errors.list')
			@endif
		</p>


		<!-- 	*************************        Edit    ****************************** -->
			@if(Auth::user()->id === $creater->id)
			<a class="btn btn-primary" href="{{action('ProjectController@edit',[$project->pid])}}">
				Edit
			</a>
			@endif


		<!-- 	*************************        pledge    ****************************** -->

		<h5>Raised Money: {{$project->raisedmoney}}</h5>

		<h5>Minimum Money: {{$project->minmoney}}</h5>
		
		<h5>Maximum Money: {{$project->maxmoney}}</h5>
		



		<!-- 	*************************   progress bar    ****************************** -->


		<div class="progress">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
			aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($project->raisedmoney)/($project->maxmoney)*100;?>%">
				{{($project->raisedmoney)/($project->maxmoney)*100}}%
			</div>
		</div>

		
		<a class="btn btn-success" href="/projects/<?php echo $project->pid;?>/pledge">Pledge</a>



	@stop





<!-- 	*************************        Below part     ****************************** -->





	@section('content2')

		<div class="navbar-part">
			<hr/>

			
			<nav class="navbar navbar-default" style="background:#fffefc">
			  <div class="container-fluid">
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#desp" data-toggle="tab">Description</a></li>
			      <li><a href="#" data-toggle="tab" style="color:#0da6e2">Updates</a></li>
			      <li><a href="#comment" data-toggle="tab" style="color:#ef9221">Comments</a></li>
			      <li><a href="#pledge" data-toggle="tab" style="color:#ae55fc">Pledges History</a></li>
			    </ul>
			  </div>
			</nav>

			<div class="tab-content" style="margin-left:10px;">

		<!-- 	*************************        Description     ****************************** -->



				<div class="tab-pane active" id="desp">
				  <p>
				   {{$project-> desp}}
				  </p>
				</div>


		<!-- 	*************************        Comments     ****************************** -->


				<div class="tab-pane" id="comment">
				  <div class="comments">
						<ul class="list-group">
						@foreach ($comments_author as $comment)
							<li class="list-group-item">
							<div id="comment-content">
								<span ><strong>{{$comment->name}}</strong></span>
								<span style="padding-left:15px; color:grey">
									
										on {{$comment->created_at}}&nbsp;
									
								</span>
								<div style="padding-top: 10px">
									<span> 
										
										<a class='btn' href='/projects/<?php echo $comment->user_id;?>/others'>@ {{$creater->name}}:</a> {{$comment->body}}
									</span>
									<button class="reply-button btn btn-info" style="float:right">Reply</button>
								</div>
							</div>
							</li>
							<!-- javascript -->
							
						@endforeach
						</ul>
					</div>
					<hr>

					<script>
						$(document).ready(function(){
					        $(".reply-button").click(function(){
					        	

					             $("#reply-hint").append("<a class='btn' href='/projects/<?php echo $comment->user_id;?>/others'>@ {{$creater->name}}:</a>");
					             $("#replied_id").val("{{$comment->user_id}}");
					             $("#replied_name").val("{{$comment->name}}");
					        })
			   			 });
					</script>

					
					
					<div class="card">
						<div class="card-block">
							<form method="POST" action="/projects/{{$project->pid}}/comments">
								{{csrf_field()}}
								<div class="form-group">
									<div id="reply-hint" name="reply_name"></div>
									<input type="hidden" name="replied_id" id="replied_id" value=1 />
									<input type="hidden" name="replied_name" id="replied_name" value="" />
									<textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
								</div>
								<div class="form-group">
									<button type="sumbit" class="btn btn-primary">Add Comment</button>
								</div>
								@include('errors.list')
							</form>
						</div>
					</div>
				</div>

				<!-- //test -->
				
				
				

		<!-- 	*************************        Pledge     ****************************** -->
		
				<div class="tab-pane" id="pledge">

					<div class="pledge-record">
						<ul class="list-group">
							@foreach($pledge_record as $record)
								<li class="list-group-item">
									<img src="http://www.webweaver.nu/clipart/img/nature/planets/shooting-star.png" width = "20px" height = "20px">
							        <span>Donated Amount:  ${{$record->amount}}</span>
							        <span style="color:grey; padding-left:15px;">on {{$record->updated_at}}</span>
							     </li>
						    @endforeach
						</ul>
					</div>

					 
				</div>

			</div>

		<!-- 	*************************        Updates     ****************************** -->

		
		</div>
	@stop

