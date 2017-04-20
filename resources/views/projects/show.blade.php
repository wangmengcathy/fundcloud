@extends('app')

	@section('content')
		<h1>{{$project->pname}}</h1>
		<hr/>
		<project>
			{{$project->desp}}
		</project>
		
		@unless($project->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($project->tags as $tag)
					<li>{{$tag->name}}</li>
				@endforeach
			</ul>
		@endunless
@stop