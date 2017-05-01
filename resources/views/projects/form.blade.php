
<div class="form-group">
{!!Form::label('pname','Project Name:')!!}
{!!Form::text('pname',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
<!-- {!!Form::label('projectcover','Project Cover:')!!} -->
<strong>Upload a Project Cover</strong> {!!Form::file('cover1')!!}
</div>

<div class="form-group">
	{!!Form::label('desp','Description:')!!}
	{!!Form::textarea('desp',null,['class'=>'form-control'])!!}
</div>

<strong>Upload files in Description</strong>
	<div style="padding-top: 10px"><p>Upload image file</p>{!!Form::file('projectsample1')!!} </div>
	<div style="padding-top: 10px"><p>Upload audio file</p>{!!Form::file('projectsample2')!!}</div>
	<div style="padding-top: 10px"><p>Upload video file</p>{!!Form::file('projectsample3')!!}</div>

<div class="form-group">
	{!!Form::label('endtime','Fund Ends At:')!!}
	{!!Form::input('date','endtime',date('Y-m-d'), ['class'=>'form-control'])!!}
</div>	
<div class="form-group">
	{!!Form::label('minmoeny','Target Minimum Money:')!!}
	{!!Form::text('minmoney',null)!!}
</div>
<div class="form-group">
	{!!Form::label('maxmoeny','Target Maximum Money:')!!}
	{!!Form::text('maxmoney',null)!!}
</div>
<div class="form-group">
	{!!Form::label('release_time','Project Release Time:')!!}
	{!!Form::input('date','release_time',date('Y-m-d'), ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('raisedmoney','Currently Raised Money:')!!}
	{!!Form::text('raisedmoney',null)!!}
</div>
<div class="form-group">
	{!!Form::label('tag_list','Tags:')!!}
	{!!Form::select('tag_list[]',$tags,null, ['class'=>'form-control','multiple'])!!}
</div>
<div>
	{!!Form::submit($submitButtonText,['class' => 'btn btn-primary form-control'])!!}
</div>