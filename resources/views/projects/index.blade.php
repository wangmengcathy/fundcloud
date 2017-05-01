@extends('layouts.app')

	@section('content')
	
	<div class="containers">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<h1 id = "head">Projects Square</h1>
		<hr/>
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Title</th>
		        <th>Description</th>
	<!-- 	        <th>Time</th> -->
		      </tr>
		    </thead>
		    <tbody>
				@foreach($projects as $project)
					@if($project->raisedmoney < $project->maxmoney)						
					    <tr>
					        <td><a href="{{action('ProjectController@show',[$project->pid])}}">{{$project->pname}}</a></td>
					        <td><div class="body">{{$project->desp}}</div></td>
					 <!--        <td><div class="body">{{$project->updated_at}}</div></td> -->
					     </tr>					    
					@endif
				@endforeach  
			    </tbody>
			 </table>		
	</div>
	@endsection
