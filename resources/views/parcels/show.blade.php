@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(顯示單一包裹表單)<br><br></h1>
     {!! Form::open() !!}
    包裹編號:{{ $parcel->id }}<br/>
    簽收與否:{{ $parcel->sign }}<br/>
    簽收憑證:{{ $parcel->Sign_proof }}<br/>
    管理員簽收时间:{{$parcel->sign_date}}<br/>
    簽收时间:{{$parcel->sign_time}}<br/>
    電話:{{$parcel->phone}}<br/>
    物品名稱:{{$parcel->type}}<br>
      {!! Form::close() !!}
<td><div class="visible-print text-center">
        {!! QrCode::size(100)->generate(Request::url('parcels/edit'))  !!}
    </div></td>
<a href="/parcels"><b>返回包裹表單</b></a>
</body>
@endsection
