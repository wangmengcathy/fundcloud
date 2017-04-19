@extends('app')

	@section('content')
		<h1>{{$project->pname}}</h1>
		<hr/>
		<project>
			{{$project->desp}}
		</project>
		
		<h5>Tags:</h5>
		<ul>
			<li>{{$project->tag}}</li>
		</ul>
@stop