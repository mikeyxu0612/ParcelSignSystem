@extends('app')
@section('contents')
<body class="antialiased" align="center">
<h1>
    包裹管理系統(包裹)<br><br>
</h1>
<p style="font-size: 150%"><a href="{{route('parcels.create')}}">新增</a></p>
<br>
<table align="center">
    <tr>
        <th>包裹編號（主鍵)</th>
        <th>住址編號</th>
        <th>簽收與否</th>
        <th>簽收憑證</th>
        <th>管理員簽收时间</th>
        <th>住戶簽收时间</th>
        <th>電話</th>
        <th>照片檔案</th>
        <th>QRcode</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @foreach($parcels as $parcel)
        <tr>
            <td>{{$parcel->id }}</td>
            <td>{{$parcel->A_ID}}</td>
            <td>{{$parcel->sign }}</td>
            <td>{{$parcel->Sign_proof }}</td>
            <td>{{$parcel->sign_date}}</td>
            <td>{{$parcel->sign_time}}</td>
            <td>{{$parcel->phone}}</td>
            <td>{{$parcel->Image}}</td>
            <td>{{$parcel->Qrcode}}</td>
            <td><a href="{{route('parcels.show',['id'=>$parcel->id])}}">显示</a></td>
            <td><a href="{{route('parcels.edit',['id'=>$parcel->id])}}">修改</a></td>
            <td>
                <form action="{{ url('/parcels/delete', ['id' => $parcel->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="/" class="ml-1 underline"><b>返回包裹管理系統主頁面</b></a>
</body>
@endsection
