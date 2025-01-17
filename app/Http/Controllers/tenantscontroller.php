<?php

namespace App\Http\Controllers;

use App\Models\parcel;
use App\Models\tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\tenantRequest;
use Illuminate\Support\Facades\Http;

class tenantscontroller extends Controller
{
    //
    public function index()
    {
        $addresses = tenant::allAddressID()->get();
        $data = [];
        foreach ($addresses as $address)
        {
            $data["$address->T_name"] = $address->T_name;
        }
        $tenants =DB::table('tenants')
            ->orderBy('tenants.id')
            ->select(
                'tenants.id',
                'tenants.T_name',
                'tenants.phone',
                'tenants.city',
                'tenants.area',
                'tenants.road'
            )->get();
        return view('tenants.index',['tenants'=>$tenants, 'addresses'=>$data]);
    }



     public function AddressID(Request $request)
     {
        $tenants = tenant::AddressID($request->input('Adrs'))->get();
         $addresses = tenant::allAddressID()->get();
         $data = [];
         foreach ($addresses as $address)
         {
             $data["$address->T_name"] = $address->T_name;
         }
       return view('tenants.index',['tenants'=>$tenants,'addresses'=>$data]);
     }




    public function create()
    {

        return view('tenants.create');
    }


    public function edit($id)
    {
        $tenant =tenant::findOrFail($id);
        return view('tenants.edit',['tenant'=>$tenant]);
    }


    public function show($id)
    {
        $tenant =tenant::findOrFail($id);
        $parcels=$tenant->parcels;
        return view('tenants.show',['tenant'=>$tenant,'parcels'=>$parcels]);
    }



    public function store(tenantRequest $request)
    {
     $T_name=$request->input('T_name');
     $phone=$request->input('phone');
     $city=$request->input('city');
     $area=$request->input('area');
     $road=$request->input('road');
     $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

     tenant::create([
         'T_name'=>$T_name,
         'phone'=>$phone,
         'created_at'=>$random_datetime,
         'updated_at'=>$random_datetime,
         'city'=>$city,
         'area'=>$area,
         'road'=>$road,
     ]);
        return redirect('tenants');
    }



    public function update($id,tenantRequest $request)
    {
        $tenant = tenant::findOrFail($id);

        $tenant->T_name=$request->input('T_name');
        $tenant->phone=$request->input('phone');
        $tenant->city=$request->input('city');
        $tenant->area=$request->input('area');
        $tenant->road=$request->input('road');
        $tenant->save();
        return redirect('tenants');
    }




    public function destroy($id)
    {
        $tenant= tenant::findOrFail($id);
        $tenant->delete();
        return redirect('tenants');
    }


    public function api_tenants()
    {
      return tenant::all();
    }


    public function api_delete(Request $request)
    {
        $tenant = tenant::find($request->input('id'));

        if ($tenant == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($tenant->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }
    }


    public function api_update(Request $request)
    {
        $tenant =tenant::find($request->input('id'));
          if($tenant == null)
          {
              return response()->json(['status'=>0,]);
          }
        $tenant->T_name=$request->input('T_name');
        $tenant->phone=$request->input('phone');
        $tenant->city=$request->input('city');
        $tenant->area=$request->input('area');
        $tenant->road=$request->input('road');
        if($tenant->save())
        {
            return response()->json(['status'=>1,]);
        }else{
            return response()->json(['status'=>0,]);
        }
    }



    public function api_show(Request $request)
    {
        return tenant::find($request->input('T_name'));
    }


    public function api_Select(Request $request)
    {
        return tenant::find($request->input('T_name'));
    }

    public function api_create(Request $request)
    {
        $T_name=$request->input('T_name');
        $phone=$request->input('phone');
        $city=$request->input('city');
        $area=$request->input('area');
        $road=$request->input('road');
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
        $tenant=tenant::create([
            'T_name'=>$T_name,
            'phone'=>$phone,
            'created_at'=>$random_datetime,
            'updated_at'=>$random_datetime,
            'city'=>$city,
            'area'=>$area,
            'road'=>$road,
        ]);
        if($tenant->save())
        {
            return response()->json(['status'=>1,]);
        }else{
            return response()->json(['status'=>0,]);
        }
    }
}
