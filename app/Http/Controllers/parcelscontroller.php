<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\parcel;
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
            ->orderBy('parcels.id')
            ->select(
                'parcels.id',
                'parcels.A_ID',
                'parcels.sign',
                'parcels.Sign_proof',
                'parcels.sign_time',
                'parcels.sign_date',
                'parcels.phone',
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
        $parcel->A_ID=$request->input('A_ID');
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
      $sign=$request->input('sign');
      $sign_date=$request->input('sign_date');
      $sign_time=$request->input('sign_time');
      $phone=$request->input('phone');
      $sign_proof=$request->input('Sign_proof');
      $A_ID=$request->input('A_ID');
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

        $parcel =parcel::create([
            'A_ID'=>$A_ID,
            'sign'=>$sign,
            'sign_date'=>$sign_date,
            'sign_time'=>$sign_time,
            'phone'=>$phone,
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
        $parcel->A_ID=$request->input('A_ID');
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

    public function photo()
    {
        request()->validate([
            'site_id' => 'required',
            'progress' => 'required',
            'estimated_delivery_date' => 'required|date',
            'actual_delivery_date' => 'required|date',
            'po_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);
        $site_id = request('site_id');
        $imagePath = request('po_image')->store("uploads/{$site_id}", 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(900, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path("storage/{$imagePath}"), 60);

        $image->save();
        // Save Purchase Order Data
        // Attach User Data
       parcel::create([
            'site_id' => request('site_id'),
            'progress' => request('progress'),
            'estimated_delivery_date' => request('estimated_delivery_date'),
            'actual_delivery_date' => request('actual_delivery_date'),
            'creator_id' => auth()->user()->id,
            'po_image' => $imagePath
        ]);
        // Session Message
        session()->flash('success', '上傳成功');
        // Redirect Route
        return redirect('parcels/create');
    }

}

