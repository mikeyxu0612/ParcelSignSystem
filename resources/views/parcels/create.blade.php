@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(新增包裹表單)<br><br>
</h1>
<form method="POST" action="{{ route('parcels.store') }}" enctype="multipart/form-data">

    <label for="Image" class="block text-sm leading-5 font-medium text-gray-700">
        表單上傳
        <input type="file" name="Image">
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
