@extends('app')

	@section('content')
		<h1>Projects</h1>
		<hr/>
		@foreach($projects as $project)
			<article>
				<h2>
					<a href="{{action('ProjectController@show',[$project->pid])}}">{{$project->pname}}</a>
				</h2>
				<div class="body">{{$project->desp}}</div>
			</article>
		@endforeach
@stop