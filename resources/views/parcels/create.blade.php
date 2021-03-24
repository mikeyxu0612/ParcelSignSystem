@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(新增包裹表單)<br><br>
</h1>
<form method="POST" action="{{ url('parcels/photos') }}" enctype="multipart/form-data">

    <label for="imgUpload1" class="block text-sm leading-5 font-medium text-gray-700">
        照片上傳
        <input type="file" id="imgUpload1" name = "imgUpload1">
        @method('POST')
        @csrf
    </label>
{!! Form::open(['url'=>'parcels/store']) !!}
@include('message.list')
 @include('parcels.form',['SubmitButtonText'=>'新增包裹'])
{!! Form::close() !!}
<a href="/parcels"><b>返回包裹表單</b></a>
</body>
@endsection
