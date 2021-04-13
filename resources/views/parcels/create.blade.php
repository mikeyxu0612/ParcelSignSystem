@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(新增包裹表單)<br><br>
</h1>
{!! Form::open(['url'=>'parcels/store']) !!}
@include('message.list')
 @include('parcels.form',['SubmitButtonText'=>'新增包裹'])
{!! Form::close() !!}
<a href="/parcels"><b>返回包裹表單</b></a>
</body>
@endsection
