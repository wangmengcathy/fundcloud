@foreach($samples as $sample)
	<div class="col-md-6 col-lg-6 " align="center"> <img alt="User Pic" src="/public/projectfiles/<?php echo $sample->sample1?>" width="200px" height="200px" class="img-responsive"> 
	
	<audio controls>
		<source src="/public/projectfiles/<?php echo $sample->sample2?>" type="audio/mpeg">
	</audio></div>
	
	<video class="col-md-6 col-lg-6 " width="240" height="240" controls>
		<source src="/public/projectfiles/<?php echo $sample->sample3?>" type="video/mp4">
	</video>
@endforeach