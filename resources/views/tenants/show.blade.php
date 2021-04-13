@extends('app')
@section('contents')
<body class="antialiased">
<h1>
    包裹管理系統(顯示單一住戶表單)<br><br>
</h1>
{!! Form::open() !!}
編號（主鍵):{{ $tenant->id }}<br>
住戶姓名:{{ $tenant->T_name }}<br>
聯絡電話:{{ $tenant->phone }}<br>
住址(外部鍵):{{ $tenant->A_ID }}<br>
{!! Form::close() !!}
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
    {{ $tenant->T_name }}所有包裹
</div>
<table>
    <tr>
        <th>包裹編號（主鍵)</th>
        <th>簽收與否</th>
        <th>簽收憑證</th>
        <th>管理員簽收时间</th>
        <th>住戶簽收时间</th>
        <th>電話</th>
        <th>照片檔案</th>
        <th>QRcode</th>
    </tr>
    @foreach($parcels as $parcel)
        <tr>
            <td>{{$parcel->id }}</td>
            <td>{{$parcel->sign }}</td>
            <td>{{$parcel->Sign_proof }}</td>
            <td>{{$parcel->sign_date}}</td>
            <td>{{$parcel->sign_time}}</td>
            <td>{{$parcel->phone}}</td>
            <td>{{$parcel->Image}}</td>
            <td><div class="visible-print text-center">
                    {!! QrCode::size(100)->generate(Request::url('$parcels.edit'))  !!}
                </div></td>
        </tr>
    @endforeach
</table>
<a href="/tenants"><b>返回住戶表單</b></a>
</body>
@endsection
