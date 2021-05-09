@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(修改包裹表單)<br><br>
</h1>
{!! Form::model($parcel,['method'=>'PATCH','action'=>['\App\Http\Controllers\parcelscontroller@update',$parcel->id]],) !!}
@include('message.list')
@include('parcels.form',['SubmitButtonText'=>'修改包裹'])

{!! Form::close() !!}
<a href="/parcels"><b>返回包裹表單</b></a>

</body>
@endsection
