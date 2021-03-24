<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parcelscontroller;
use App\Http\Controllers\addresscontroller;
use App\Http\Controllers\tenantscontroller;
use App\Http\Controllers\Buildingscontroller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('parcel_receipt_sys');
});


Route::get( 'parcels',[parcelscontroller::class,'index'])->name('parcels.index');

Route::get( 'parcels/create',[parcelscontroller::class,'create'])->name('parcels.create');

Route::get( 'parcels/{id}',[parcelscontroller::class,'show'])->where('id','[0-9]+')->name('parcels.show');

Route::get( 'parcels/{id}/edit',[parcelscontroller::class,'edit'])->where('id','[0-9]+')->name('parcels.edit');

Route::post('parcels/store',[parcelscontroller::class,'store'])->where('id','[0-9]+')->name('parcels.store');

Route::patch('parcels/update/{id}',[parcelscontroller::class,'update'])->where('id','[0-9]+')->name('parcels.update');

Route::delete('parcels/delete/{id}',[parcelscontroller::class, 'destroy'])->where('id','[0-9]+')->name('parcels.destroy');

Route::post('parcels/photos',[parcelscontroller::class,'photos'])->name('parcels.photo');



Route::get( 'tenants',[tenantscontroller::class,'index'])->name('tenants.index');

Route::get( 'tenants/create',[tenantscontroller::class,'create'])->name('tenants.create');

Route::get( 'tenants/{id}',[tenantscontroller::class,'show'])->where('id','[0-9]+')->name('tenants.show');

Route::get( 'tenants/{id}/edit',[tenantscontroller::class,'edit'])->where('id','[0-9]+')->name('tenants.edit');

Route::post('tenants/store',[tenantscontroller::class,'store'])->name('tenants.store');

Route::patch('tenants/update/{id}',[tenantscontroller::class,'update'])->where('id','[0-9]+')->name('tenants.update');

Route::delete('tenants/delete/{id}',[tenantscontroller::class, 'destroy'])->where('id','[0-9]+')->name('tenants.destroy');

Route::post('tenants/AddressID',[tenantscontroller::class,'AddressID'])->name('tenants.AddressID');

