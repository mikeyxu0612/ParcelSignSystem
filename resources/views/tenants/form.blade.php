<div class="form-group">
    {!! Form::label('T_name','住戶姓名:') !!}
    {!! Form::text('T_name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','聯絡電話:') !!}
    {!! Form::text('phone',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('city','縣市') !!}
    {!! Form::text('city',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('area','區/鎮') !!}
    {!! Form::text('area',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('road','路段') !!}
    {!! Form::text('road',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($SubmitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>

