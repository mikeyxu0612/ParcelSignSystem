@extends('app')
@section('contents')
<body class="antialiased" style="text-align:center;">
<h1>
    包裹管理系統(住址)<br><br>
</h1>
<p style="font-size: 150%"><a href="{{route('addresses.create')}}">新增</a></p>
<br>
<table align="center" style="text-align:center;">
    <tr style="text-align:center;">
        <th >編號（主鍵)</th>
        <th >住址</th>
        <th >棟名（外部鍵)</th>
        <th >聯絡電話</th>
        <th >操作1</th>
        <th >操作2</th>
        <th >操作3</th>
    </tr >
    @foreach($addresses as $address)
        <tr style="text-align:center;">
            <td>{{$address->id }}</td>
            <td>{{$address ->address }}</td>
            <td>{{$address->building->B_Name }}</td>
            <td>{{$address->phone }}</td>
            <td><a href="{{route('addresses.show',['id'=>$address->id])}}">显示</a></td>
            <td><a href="{{route('addresses.edit',['id'=>$address->id])}}">修改</a></td>
            <td>
                <form action="{{ url('/addresses/delete', ['id' => $address->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="/" class="ml-1 underline" style="text-align:center;"><b>返回包裹管理系統主頁面</b></a>
</body>
@endsection
