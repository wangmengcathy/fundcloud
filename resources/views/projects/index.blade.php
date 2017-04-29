@extends('layouts.app')

	@section('content')
	
	<div class="containers">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<h1 id = "head">Projects</h1>
		<hr/>
		@foreach($projects as $project)
			@if($project->raisedmoney < $project->maxmoney)
				<article>
					<h2>
						<a href="{{action('ProjectController@show',[$project->pid])}}">{{$project->pname}}</a>
					</h2>
					<div class="body">{{$project->desp}}</div>
				</article>
			@endif
		@endforeach
	</div>
	@endsection
