@extends('layouts.app')

	@section('content')
		<h1>{{$project->pname}}</h1>
		<p>
			End Time: {{$project->endtime->diffForHumans()}}
		</p>
		<hr/>

		<project>
			{{$project->desp}}
		</project>
		
		<a class="btn" href="/projects/<?php echo $project->pid;?>/others">Creater:{{$creater->name}}</a>
		@unless($project->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($project->tags as $tag)
					<li>{{$tag->name}}</li>
				@endforeach
			</ul>
		@endunless
		<h5>Raised Money: {{$project->raisedmoney}}</h5>
		<h5>Raised Money: {{$project->maxmoney}}</h5>
		
		<div class="progress">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
			aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($project->raisedmoney)/($project->maxmoney)*100;?>%">
				{{($project->raisedmoney)/($project->maxmoney)*100}}%
			</div>
		</div>
		
		<a class="btn" href="/projects/<?php echo $project->pid;?>/pledge">Pledge</a>

		<hr>
		
		<div class="comments">
			<ul class="list-group">
			@foreach ($project->comments as $comment)
				<li class="list-group-item">
				<strong>
					{{$comment->created_at->diffForHumans()}}:&nbsp;
				</strong>
				{{$comment->body}}
				</li>
			@endforeach
			</ul>
		</div>
		<hr>
		
		<div class="card">
			<div class="card-block">
				<form method="POST" action="/projects/{{$project->pid}}/comments">
					{{csrf_field()}}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="sumbit" class="btn btn-primary">Add Comment</button>
					</div>
					@include('errors.list')
				</form>
				
			</div>
		</div>
@stop

