
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