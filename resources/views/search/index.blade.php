@extends('layouts.app')

	@section('content')
	<div class="containers">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<h1 id = "head">Search Result</h1>
		<hr/>
		@if($search_result->count() < 1)
			<p> No relevant content.</p>
		@else
			@foreach($search_result as $result)
				<article>
					<h2> {{$result -> pname}}</h2>
					<div class="body">{{$result -> desp}}</div>
				</article>
			@endforeach
		@endif
<!-- 		<p> {{$search_result}}</p> -->
	</div>
	@endsection