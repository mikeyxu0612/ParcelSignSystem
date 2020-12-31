<?php

namespace App\Http\Controllers;

use App\Models\parcel;
use App\Models\tenant;
use Carbon\Carbon;
/*use Illuminate\Http\Request;*/
use Illuminate\Support\Facades\DB;
use App\Http\Requests\tenantRequest;

class tenantscontroller extends Controller
{
    //
    public function generateRandomfirststring($length=10)
    {
        $firststring=array("陳","林","黃","張","李","王","吳","劉","蔡","楊","許","鄭","謝","郭","洪","曾","邱","廖","賴");
        $randomfirst='';
        $randomfirst .= $firststring[rand(0,18)];
        return $randomfirst;
    }

    public function generateRandomsecondstring($length=10)
    {
        $secondstring=array("怡","珠","文","婷","雅","佳","君","俊","嘉","家","宏");
        $randomsecond='';
        $randomsecond .=$secondstring[rand(0, 9)];
        return $randomsecond;
    }
    public function generateRandomlaststring($length=10)
    {
        $laststring=array("珠","芃","杏","川","梓","武","苑","藝","孜","然");
        $randomlast='';
        $randomlast .= $laststring[rand(0,9)];
        return $randomlast;
    }
    public function generateRandomTname()
    {
        $first_name =$this->generateRandomfirststring(rand(2,15));
        $second_name=$this->generateRandomsecondstring(rand(2,10));
        $last_name=$this->generateRandomlaststring(rand(2,10));
        $T_name=$first_name.$second_name.$last_name;
        return  $T_name;
    }
    public function generatestring($length =10)
    {
        $numbers='0123456789';
        $randomstring='';
        $numbersLength=strlen($numbers);
        for($i=0;$i<4;$i++)
            $randomstring .=$numbers[rand(0,$numbersLength-1)];
        return $randomstring;
    }
    public function generateRandomphone()
    {
        $first_number =$this->generatestring(rand(0,5));
        $last_number =$this->generatestring(rand(5,9));
        $phone =$first_number . $last_number;
        return $phone;
    }
    public  function generateRandomAID()
    {
        $first_number=$this->generatestring(rand(0,1));
        $second_number=$this->generatestring(rand(0,1));
        $A_ID=$first_number.$second_number;
        return $A_ID;
    }
    public function index()
    {
        /*$tenants =tenant::all()->sortBy('id',SORT_ASC);*/
        $tenants =DB::table('tenants')
            ->orderBy('tenants.id')
            ->select(
                'tenants.id',
                'tenants.T_name',
                'tenants.phone',
                'tenants.A_ID'
            )->get();
        return view('tenants.index',['tenants'=>$tenants]);
    }
    public function create()
    {

       /*$T_name=$this->generateRandomTname();
       $phone=$this->generateRandomphone();
        $A_ID=rand(0,30);
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

        $tenant =tenant::create([
            'T_name'=>$T_name,
            'phone'=>$phone,
            'A_ID'=>$A_ID,
        'created_at'=>$random_datetime,
        'updated_at'=>$random_datetime  ]);*/
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
     $A_ID=$request->input('A_ID');
     $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

     tenant::create([
         'T_name'=>$T_name,
         'phone'=>$phone,
         'A_ID'=>$A_ID,
         'created_at'=>$random_datetime,
         'updated_at'=>$random_datetime,
     ]);
        return redirect('tenants');
    }

    public function update($id,tenantRequest $request)
    {
        $tenant = tenant::findOrFail($id);

        $tenant->T_name=$request->input('T_name');
        $tenant->phone=$request->input('phone');
        $tenant->A_ID=$request->input('A_ID');
        $tenant->save();
        return redirect('tenants');

    }
    public function destroy($id)
    {
        $tenant= tenant::findOrFail($id);
        $tenant->delete();
        return redirect('tenants');
    }
}
