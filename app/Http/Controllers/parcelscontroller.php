<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\parcel;
use BaconQrCode\Encoder\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\parcelRequest;
use Intervention\Image\Facades\Image;
use function Composer\Autoload\includeFile;
use Illuminate\Support\Facades\Storage;


class parcelscontroller extends Controller
{
    //
        public  function index()
    {
        /* $parcels =parcel::all()->sortBy('id',SORT_ASC);*/
        $parcels =DB::table('parcels')
            ->join('tenants','parcels.Sign_proof','=','tenants.T_name')
            ->orderBy('parcels.id')
            ->select(
                'parcels.id',
                'parcels.sign',
                'parcels.Sign_proof',
                'parcels.sign_time',
                'parcels.sign_date',
                'tenants.id as t_ID',
                'parcels.phone',
                'parcels.Image',
                'parcels.Qrcode',
            )->get();
        return view( 'parcels.index',['parcels'=>$parcels]);
    }


    public function api_parcels()
    {
        return parcel::all();
    }



    public function api_delete(Request $request)
    {
        $parcel=parcel::find($request->input('id'));
        if($parcel == null)
        {
         return response()->json([
            'status'=>0,
         ]);
        }

        if ($parcel->delete())
        {
         return response()->json([
             'status'=>1,
         ]) ;
        }
    }



    public function api_update(Request $request)
    {
        $parcel=parcel::find($request->input('id'));
        if($parcel ==null)
        {
            return response()->json([
                'status'=>0,
            ]);
        }
        $parcel->sign=$request->input('sign');
        $parcel->Sign_proof=$request->input('Sign_proof');
        $parcel->sign_date=$request->input('sign_date');
        $parcel->phone=$request->input('phone');
        $parcel->sign_time=$request->input('sign_time');

        if($parcel->save())
        {
            return response()->json([
                'status'=>1,

            ]);
        }else{
         return response()->json([
             'status'=>0,
         ]);
        }
    }




    public function api_create(Request $request)
    {

        $sign=$request->input('sign');
        $sign_date=$request->input('sign_date');
        $sign_time=$request->input('sign_time');
        $phone=$request->input('phone');
        $sign_proof=$request->input('Sign_proof');
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

      $parcel = parcel::create([
            'sign'=>$sign,
            'sign_date'=>$sign_date,
            'sign_time'=>$sign_time,
            'phone'=>$phone,
            'Sign_proof'=>$sign_proof,
            'created_at'=>$random_datetime,
            'updated_at'=>$random_datetime,
        ]);
        if($parcel->save())
        {
            return response()->view('parcels.show')->json([
                'status'=>1,

            ]);
        }else{
            return response()->json([
                'status'=>0,
            ]);
        }
    }



    public function create()
    {
        return view('parcels/create');
    }


    public  function show($id)
    {
         $parcel =parcel::findOrFail($id);
         return view('parcels.show',['parcel'=>$parcel]);
    }



    public  function edit($id)
    {
        $parcel =parcel::findOrFail($id);
        return view('parcels.edit',['parcel'=>$parcel]);
    }


    public function store(parcelRequest $request)
    {
        $Image=$request->file('photo')->store('public/images');
      $sign=$request->input('sign');
      $sign_date=$request->input('sign_date');
      $sign_time=$request->input('sign_time');
      $phone=$request->input('phone');
      $sign_proof=$request->input('Sign_proof');
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
        parcel::create([
            'sign'=>$sign,
            'sign_date'=>$sign_date,
            'sign_time'=>$sign_time,
            'phone'=>$phone,
            'photo'=>$Image,
            'Sign_proof'=>$sign_proof,
            'created_at'=>$random_datetime,
            'updated_at'=>$random_datetime,
        ]);
        return redirect('parcels');
    }


    public function update($id,parcelRequest $request)
    {
        $parcel = parcel::findOrFail($id);

        $parcel->sign=$request->input('sign');
        $parcel->Sign_proof=$request->input('Sign_proof');
        $parcel->sign_date=$request->input('sign_date');
        $parcel->phone=$request->input('phone');
        $parcel->sign_time=$request->input('sign_time');
        $parcel->save();
        return redirect('parcels');

    }
    public function destroy($id)
    {
       $parcel = parcel::findOrFail($id);
        $parcel->delete();
        return redirect('parcels');
    }

    public function photos(Request $request)
    {
   $Image=$request->file('imgUpload1')->store('images');
    parcel::create([
        'Image'=>$Image
    ]);
    return redirect('parcels');
    }
}

