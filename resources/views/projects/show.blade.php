@extends('layouts.app')

	@section('content')
		<h1>{{$project->pname}}
		
		@if(Auth::user()->id == $creater->id)
			<a class="btn btn-success" href="{{action('ProjectController@edit',[$project->pid])}}">
				Edit
			</a>
			@if($published_pro != '[]')
				<a class="btn btn-primary" href="{{action('ProjectController@announceFinish',[$project->pid])}}">
					Announce Finished
				</a>
			@endif
		@endif
<!-- 		@if($already_pledge != null)
			@if($already_pledge->transaction_status == 'posted')
			<a class="btn btn-warning" href="<?php echo$project->pid?>/rate">Rate</a>
			@endif
		@endif -->
		</h1>
		<p>
			End Time: {{$project->endtime->diffForHumans()}} <a class="btn" href="/projects/<?php echo $creater->id;?>/others">Created By:{{$creater->name}}</a>
		</p>
		<div class="row">
			<div class="col-md-4 col-lg-4 "> <img alt="User Pic" src="/public/projectcovers/<?php echo $project->projectcover?>" width="300px" height="300px" class="img-responsive"> 
			</div>
		
			<div class=" col-md-8 col-lg-8 "> 
		
				<!--tags-->
				@unless($project->tags->isEmpty())
					<h5>Tags:
						@foreach($project->tags as $tag)
							<span>{{$tag->name}}</span>
						@endforeach
					</h5>
				@endunless
			
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
					<div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="70"
					aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($project->raisedmoney)/($project->maxmoney)*100;?>%">
						{{($project->raisedmoney)/($project->maxmoney)*100}}%
					</div>
				</div>

				
				<a class="btn btn-primary" href="/projects/<?php echo $project->pid;?>/pledge">Pledge</a>

			</div> <!-- 8 -->
		</div> <!-- row -->
	@stop




<!-- 	*************************        Below part     ****************************** -->





	@section('content2')

		<div class="navbar-part">
			<hr/>

			
			<nav class="navbar navbar-default" style="background:#fffefc">
			  <div class="container-fluid">
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#desp" data-toggle="tab">Description</a></li>
			      <li><a href="#update" data-toggle="tab" style="color:#0da6e2">Updates</a></li>
			      <li><a href="#comment" data-toggle="tab" style="color:#ef9221">Comments</a></li>
			      <li><a href="#pledge" data-toggle="tab" style="color:#ae55fc">Pledges History</a></li>
			      @if($rates != '[]')
			       <li><a href="#rates" data-toggle="tab" style="color:#59a517">Rating History</a></li>
			       @endif
			    </ul>
			  </div>
			</nav>

			<div class="tab-content" style="margin-left:10px;">

		<!-- 	*************************        Description     ****************************** -->



				<div class="tab-pane active" id="desp">
					<div class="panel panel-default">
    					<div class="panel-body">{{$project-> desp}}</div>
					</div>
					  <!--samples-->
						@include('projects.sample')
					
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

			

		<!-- 	*************************        Updates     ****************************** -->
				<div class="tab-pane" id="update">
					<div class="update-record">
						<div align="center">
							@if(Auth::user()->id == $creater->id)
								<a class="btn btn-success" href="/<?php echo $project->pid;?>/posting">Add Posting</a>
							@endif
						</div>
						

			<!-- *************************************** timeline ************************************ -->

					<section id="cd-timeline">
						@foreach($postings as $posting)
							<div class="cd-timeline-block">
								<div class="cd-timeline-img">
									<img src="/public/img/Photo-icon2.jpg" alt="Picture">
								</div> <!-- cd-timeline-img -->
								<div class="cd-timeline-content">
									 <h2 style="font-size:20px">{{$posting->posting_desp}} </h2>
									 @if($posting->material != '')
										 <p class="timeline-p"><strong>Image File:</strong></p>
										 <img alt="User Pic" src="/public/projectpostings/<?php echo $posting->material?>" width="350px" height="350px" class="img-responsive"> 
									 @endif
									 @if($posting->audio != '')
										<p class="timeline-p"><strong>Audio File:</strong></p>
										<audio controls>
											<source src="/public/projectpostings/<?php echo $posting->audio?>" type="audio/mpeg">
										</audio>
									@endif
									@if($posting->video != '')
										<p class="timeline-p"><strong>Video File:</strong></p>
										<video width="300" height="300" controls>
											<source src="/public/projectpostings/<?php echo $posting->video?>" type="video/mp4">
										</video>
									@endif
									<span class="cd-date">{{$posting->created_at}}</span>
								</div> <!-- cd-timeline-content -->
							</div> <!-- cd-timeline-block -->
						@endforeach

					</section>


					</div>
				</div>

				<!-- 	*************************        Rating     ****************************** -->


				 @if($rates != '[]')
					<div class="tab-pane" id="rates">

						<div class="rating-block">
							<h5>Average user rating</h5>
								@if($rate_avg > 0 && $rate_avg <= 1)
									@include('projects.showrating1')
								@endif
								@if($rate_avg > 1 && $rate_avg <= 2)
									@include('projects.showrating2')
								@endif
								@if($rate_avg > 2 && $rate_avg <= 3)
									@include('projects.showrating3')
								@endif
								@if($rate_avg > 3 && $rate_avg <= 4)
									@include('projects.showrating4')
								@endif
								@if($rate_avg > 4 && $rate_avg <= 5)
									@include('projects.showrating5')
								@endif
							<h5 class="bold padding-bottom-7"><?php echo number_format($rate_avg, 1, '.', ',')?> <small>/ 5</small></h5>
						</div>

						<ul class="list-group">
							@foreach($rates as $rate)
								<li class="list-group-item">
									<img src="http://www.webweaver.nu/clipart/img/nature/planets/shooting-star.png" width = "20px" height = "20px">
									<span>{{$rate -> name}}</span>
							        <span>give rate: </span> 
							        <span>
												@if($rate -> rating > 0 && $rate -> rating <= 1)
													@include('projects.showrating1')
												@endif
												@if($rate -> rating > 1 && $rate -> rating <= 2)
													@include('projects.showrating2')
												@endif
												@if($rate -> rating > 2 && $rate -> rating <= 3)
													@include('projects.showrating3')
												@endif
												@if($rate -> rating > 3 && $rate -> rating <= 4)
													@include('projects.showrating4')
												@endif
												@if($rate -> rating > 4 && $rate -> rating <= 5)
													@include('projects.showrating5')
												@endif
							        </span>
							        <span style="color:grey; padding-left:15px;">on {{$rate->updated_at}}</span>
							        <div style="padding-left: 10px; padding-top: 5px;">
							        <!-- 	<h5>Rate Content:</h5> -->
							        	<p style="padding-left: 5px;padding-top: 5px">{{$rate->rate_content}}</p>
							        </div>
							     </li>
						    @endforeach
						</ul>
					</div>
				@endif
	</div>
	@stop

