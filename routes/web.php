<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parcelscontroller;
use App\Http\Controllers\addresscontroller;
use App\Http\Controllers\tenantscontroller;
use App\Http\Controllers\Buildingscontroller;
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


Route::get( 'addresses',[addresscontroller::class,'index'])->name('addresses.index');

Route::get( 'addresses/create',[addresscontroller::class,'create'])->name('addresses.create');

Route::get( 'addresses/{id}',[addresscontroller::class,'show'])->where('id','[0-9]+')->name('addresses.show');

Route::get( 'addresses/{id}/edit',[addresscontroller::class,'edit'])->where('id','[0-9]+')->name('addresses.edit');

Route::post('addresses/store',[addresscontroller::class,'store'])->name('addresses.store');

Route::patch('addresses/update/{id}',[addresscontroller::class,'update'])->where('id','[0-9]+')->name('addresses.update');

Route::delete('addresses/delete/{id}',[addresscontroller::class, 'destroy'])->where('id','[0-9]+')->name('addresses.destroy');


Route::get( 'Buildings',[Buildingscontroller::class,'index'])->name('Buildings.index');

Route::get( 'Buildings/create',[Buildingscontroller::class,'create'])->name('Buildings.create');

Route::get( 'Buildings/{id}',[Buildingscontroller::class,'show'])->where('id','[0-9]+')->name('Buildings.show');

Route::get( 'Buildings/{id}/edit',[Buildingscontroller::class,'edit'])->where('id','[0-9]+')->name('Buildings.edit');

Route::post('Buildings/store',[Buildingscontroller::class,'store'])->name('Buildings.store');

Route::patch('Buildings/update/{id}',[Buildingscontroller::class,'update'])->where('id','[0-9]+')->name('Buildings.update');

Route::delete('Buildings/delete/{id}',[Buildingscontroller::class, 'destroy'])->where('id','[0-9]+')->name('Buildings.destroy');



Route::get( 'parcels',[parcelscontroller::class,'index'])->name('parcels.index');

Route::get( 'parcels/create',[parcelscontroller::class,'create'])->name('parcels.create');

Route::get( 'parcels/{id}',[parcelscontroller::class,'show'])->where('id','[0-9]+')->name('parcels.show');

Route::get( 'parcels/{id}/edit',[parcelscontroller::class,'edit'])->where('id','[0-9]+')->name('parcels.edit');

Route::post('parcels/store',[parcelscontroller::class,'store'])->name('parcels.store');

Route::patch('parcels/update/{id}',[parcelscontroller::class,'update'])->where('id','[0-9]+')->name('parcels.update');

Route::delete('parcels/delete/{id}',[parcelscontroller::class, 'destroy'])->where('id','[0-9]+')->name('parcels.destroy');

Route::post('parcels/photo',[parcelscontroller::class,'photo'])->where('id','[0-9]+')->name('parcels.photo');


Route::get( 'tenants',[tenantscontroller::class,'index'])->name('tenants.index');

Route::get( 'tenants/create',[tenantscontroller::class,'create'])->name('tenants.create');

Route::get( 'tenants/{id}',[tenantscontroller::class,'show'])->where('id','[0-9]+')->name('tenants.show');

Route::get( 'tenants/{id}/edit',[tenantscontroller::class,'edit'])->where('id','[0-9]+')->name('tenants.edit');

Route::post('tenants/store',[tenantscontroller::class,'store'])->name('tenants.store');

Route::patch('tenants/update/{id}',[tenantscontroller::class,'update'])->where('id','[0-9]+')->name('tenants.update');

Route::delete('tenants/delete/{id}',[tenantscontroller::class, 'destroy'])->where('id','[0-9]+')->name('tenants.destroy');

Route::post('tenants/AddressID',[tenantscontroller::class,'AddressID'])->name('tenants.AddressID');
