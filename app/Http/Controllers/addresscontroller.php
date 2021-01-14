<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\Building;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\addressRequest;
class addresscontroller extends Controller
{
    //
    public  function index()
    {
       /* $addresses=DB::table('addresses')
            ->join('buildings','addresses.B_ID','=','buildings.id')
            ->orderBy('addresses.id')
            ->select(
                'addresses.id',
                'addresses.address',
                'buildings.B_Name as Bname',
                'addresses.phone'
            )->get();
*/$addresses = address::all();
       return view( ' addresses.index',['addresses'=>$addresses]);
}


    public function create()
    {
        $buildings=DB::table('buildings')
            ->select('buildings.id','buildings.B_Name')
            ->orderBy('buildings.id','asc')
            ->get();

        $data= [];
        foreach ($buildings as $building)
        {
            $data[$building->id]=$building->B_Name;
        }

        $addresses=DB::table('addresses')
            ->select('addresses.id','addresses.address')
            ->orderBy('addresses.id','asc')
            ->get();

        $datas =[];
        foreach ($addresses as $address)
        {
            $datas[$address->id]=$address->address;
        }
        return view( 'addresses.create',['buildings' =>$data],['addresses'=>$datas]);
    }



  public function edit($id)
 {
    $buildings=DB::table('buildings')
        ->select('buildings.id','buildings.B_Name')
        ->orderBy('buildings.id','asc')
        ->get();

    $data=[];
    foreach ($buildings as $building)
    {
        $data[$building->id] = $building->B_Name;
    }

    $addresses=DB::table('addresses')
        ->select('addresses.id','addresses.address')
        ->orderBy('addresses.id','asc')
        ->get();

    $datas =[];
    foreach ($addresses as $addresss)
    {
        $datas[$addresss->id]=$addresss->address;
    }

$address = address::findOrFail($id);

return view('addresses.edit',['address'=>$address,'buildings'=>$data,'addresses'=>$datas]);
 }




 public function show($id)
 {
    $address = address::findOrFail($id);
    $tenants=$address->tenants;
    return view('addresses.show',['address'=>$address,'tenants'=>$tenants]);
 }



 public function store(addressRequest $request)
 {

 $address=$request->input('address');
 $B_ID=$request->input('B_ID');
 $phone=$request->input('phone');
 $random_datetime = Carbon::now()->subMinutes(rand(1,55));

 address::create([
     'address'=>$address,
     'B_ID'=>$B_ID,
     'phone'=>$phone,
     'created_at'=>$random_datetime,
     'updated_at'=>$random_datetime
 ]);
return redirect('addresses');
 }




 public function update($id,addressRequest $request)
 {

    $address = address::findOrFail($id);

    $address->address = $request->input('address');
    $address->B_ID = $request->input('B_ID');
    $address->phone = $request->input('phone');
    $address->save();
    return redirect('addresses');
 }



 public function destroy($id)
 {
    $address = address::findOrFail($id);
    $address->delete();
    return redirect('addresses');
 }


 public function api_addresses()
 {
    return address::all();
 }


  public function api_delete(Request $request)
  {
      $address =address::find($request->input('id'));
      if($address == null)
      {
          return response()->json([
              'status'=>0,
          ]);
      }

      if ($address->delete())
      {
          return response()->json([
              'status'=>1,
          ]) ;
      }
  }



  public function api_update(Request $request)
  {
      $address =address::find($request->input('id'));
      if($address == null)
      {
        return response()->json([
            'status'=> 0,
        ]) ;
      }
      $address->address = $request->input('address');
      $address->B_ID = $request->input('B_ID');
      $address->phone = $request->input('phone');
      if($address->save())
      {
          return response()->json(['status'=>1,]);
      }else{
          return response()->json(['status'=>0,]);
      }
  }


}
