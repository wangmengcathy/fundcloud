@extends('layouts.app')

	@section('content')
	<div class="containers">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<h1 id = "head">Pledge Feeds</h1>
		<hr/>
		@if($pledgefeeds != '[]')
			<?php $i = 0;?>
			@while(true)
				<div class="row">
					<?php $max = $i+3;?>
		            @for (; $i < $max; $i++)
		            		@if($i >= count($pledgefeeds)) 
		            			@break;
		            		@endif
		                    <?php $result = $pledgefeeds[$i];?>                   
		                            <div class="col-md-4">
		                                <div class="thumbnail">
		                                  <a href= "{{action('ProjectController@show',[$result->pid])}}">
		                                    <img src="/public/projectcovers/<?php echo $result->projectcover?>" alt="Lights" style="width:100%" height="300px">
		                                    <div class="caption">
		                                        <p><strong>{{$result->pname}}</strong></p>
		                                        <p>{{$result->desp}}</p>
		                                    </div>
		                                  </a>
		                                </div>
		                            </div>
		            @endfor
		            @if($i < $max) 
		            	@break; 
		            @endif
		        </div>        
	        @endwhile
      	@else
                <div align="center"> No Pledge Content. </div>
       	@endif
	</div>
	@endsection


	