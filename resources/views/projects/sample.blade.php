@foreach($samples as $sample)
	@if($sample->sample1 != '')
		<div  align="center" class="sample col-sm-4"> <strong>Image File:</strong><img alt="User Pic" src="/public/projectfiles/<?php echo $sample->sample1?>" width="320px" height="320px" class="img-responsive"> </div>
	@endif

	@if($sample->sample2 != '')
		<div align="center" class="sample col-sm-4">
			<p><strong>Audio File:</strong></p>
			<audio controls>
				<source src="/public/projectfiles/<?php echo $sample->sample2?>" type="audio/mpeg">
			</audio>
		</div>
	@endif

	@if($sample->sample3 != '')
		<div align="center" class="sample col-sm-4">
			<p><strong>Video File:</strong></p>
			<video width="300" height="300" controls>
				<source src="/public/projectfiles/<?php echo $sample->sample3?>" type="video/mp4">
			</video>
		</div>
	@endif
@endforeach