<?php

use App\Http\Controllers\addresscontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Buildingscontroller;
use App\Http\Controllers\parcelscontroller;
use App\Http\Controllers\tenantscontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[AuthController::class,'register']);

Route::post('login',[AuthController::class,'login']);


Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::get('parcels',[parcelscontroller::class,'api_parcels']) ;

    Route::delete('parcels/delete',[parcelscontroller::class,'api_delete']);

    Route::patch('parcels/update',[parcelscontroller::class,'api_update']);

    Route::post('parcel/create',[parcelscontroller::class,'api_create']);




    Route::get('tenants',[tenantscontroller::class,'api_tenants']);

    Route::post('tenants/create',[tenantscontroller::class,'api_create']);

    Route::delete('tenants/delete',[tenantscontroller::class,'api_delete']);

    Route::patch('tenants/update',[tenantscontroller::class,'api_update']);

    Route::get('tenants/show',[tenantscontroller::class,'api_show']);

    Route::post('tenants/Select',[tenantscontroller::class,'api_Select']);

});
