@extends('layouts.app')

	@section('content')
		<h1>{{$project->pname}}
		
		@if(Auth::user()->id == $creater->id)
		<a class="btn btn-success" href="{{action('ProjectController@edit',[$project->pid])}}">
			Edit
		</a>
		@endif
		</h1>
		<p>
			End Time: {{$project->endtime->diffForHumans()}} <a class="btn" href="/projects/<?php echo $creater->id;?>/others">Created By:{{$creater->name}}</a>
		</p>
		
		<hr/>
		<!--tags-->
		@unless($project->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($project->tags as $tag)
					<li>{{$tag->name}}</li>
				@endforeach
			</ul>
		@endunless
		<!--samples-->
		@foreach($samples as $sample)
			<div class="col-md-6 col-lg-6 " align="center"> <img alt="User Pic" src="/public/projectfiles/<?php echo $sample->sample1?>" width="200px" height="200px" class="img-responsive"> 
			
			<audio controls>
				<source src="/public/projectfiles/<?php echo $sample->sample2?>" type="audio/mpeg">
			</audio></div>
			
			<video class="col-md-6 col-lg-6 " width="240" height="240" controls>
				<source src="/public/projectfiles/<?php echo $sample->sample3?>" type="video/mp4">
			</video>
		@endforeach
	<!-- 	*************************        Like    ****************************** -->

		<p>  
			
			@if (Auth::user() && $already_like == 0)
				{!!Form::open(['action'=>'LikeController@like'])!!}			
				{!!Form::token()!!}
				<input type="hidden" name="project_id" id="postvalue" value="{{$project->pid}}" />
					<button type="sumbit" style="all:none">
						<img src="http://www.stickylife.com/images/u/fc35d68ad835449f961625e7e31dbede-800.png" width = "20px" height = "20px">
					</button> {{$count}}
				{!!Form::close()!!}
				@include('errors.list')
			@endif

			@if (Auth::user() && $already_like > 0)
				{!!Form::open(['action'=>'LikeController@unlike'])!!}			
				{!!Form::token()!!}
				<input type="hidden" name="project_id" id="postvalue" value="{{$project->pid}}" />
					<button type="sumbit" style="all:none">
						<img src='https://s.w.org/images/core/emoji/2.2.1/svg/2764.svg' width = "20px" height = "20px">
					</button> {{$count}}

				{!!Form::close()!!}
				@include('errors.list')
			@endif
		</p>


			


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
							@unless($comments_author == '[]')
								<?php $i = 0;?>
								@foreach ($comments_author as $comment)
								<?php  $i++; ?>
									<li class="list-group-item">
									<div id="comment-content">
										
											<img alt="User Pic" src="/public/photo/<?php echo $comment->imagename?>" style="border-radius: 50%; float:left" class="img-responsive" height="25px" width="30px">
										
											<span style="padding-left:15px"><strong>{{$comment->name}}</strong></span>
											<span style="padding-left:15px; color:grey">
												
													on {{$comment->created_at}}&nbsp;
												
											</span>
									
										<div style="padding-top: 10px; padding-left: 4%">
											<span> 
												@if($comment->replied_name != "")
												<a class='btn' href='/projects/<?php echo $comment->replied_id;?>/others'>@ {{$comment->replied_name}}:</a> 
												@endif
												{{$comment->body}}

											</span>
											<button class="reply-button-<?php echo $i;?> btn btn-info" style="float:right">Reply</button>
										</div>
									</div>
									</li>
									<!-- javascript -->

									<script>
										$(document).ready(function(){
									        $(".reply-button-<?php echo $i;?>").click(function(){	
												 $("#reply-hint").html('');
									             $("#reply-hint").append("<a class='btn' href='/projects/<?php echo $comment->user_id;?>/others'>@ {{$comment->name}}:</a>");
									             $("#replied_id").val("{{$comment->user_id}}");
									             $("#replied_name").val("{{$comment->name}}");
									        })
							   			 });
									</script>
									
								@endforeach
							@endunless
						</ul>

					</div>
					<hr>
			
					
					<div class="card">
						<div class="card-block">
							<form method="POST" action="/projects/{{$project->pid}}/comments">
								{{csrf_field()}}
								<div class="form-group">
									<div id="reply-hint" name="reply_name"></div>
									<input type="hidden" name="replied_id" id="replied_id" value="" />
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

