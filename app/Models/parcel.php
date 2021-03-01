<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcel extends Model
{
    use HasFactory;
 /*   protected  $table="parcels";*/
    protected  $fillable=[
        'A_ID',
        'sign',
        'sign_time',
        'Sign_proof',
        'sign_date',
        'phone',
        'Image',
        'Qrcode',
        'created_at',
        'updated_at'
    ];
    public function scopeAllData($query)
    {
        $query  ->orderBy('parcels.id')
            ->select(
                'parcels.id',
                'parcels.A_ID',
                'parcels.sign',
                'parcels.Sign_proof',
                'parcels.sign_date',
                'parcels.sign_time',
                'parcels.phone',
                'parcels.photo',
            );
    }

}
