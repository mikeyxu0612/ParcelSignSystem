<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenant extends Model
{
    use HasFactory;

    /*   protected  $table="tenants";*/
    protected $fillable = [
        'T_name',
        'phone',
        'A_ID',
        'city',
        'area',
        'road',
        'created_at',
        'updated_at'
    ];

    public function scopeAllData($query)
    {
        $query->orderBy('tenants.id')
            ->select(
                'tenants.id',
                'tenants.T_name',
                'tenants.phone',
                'tenants.A_ID'
            );
    }

    public function parcels()
    {
        return $this->hasMany('App\Models\parcel', 'Sign_proof', 'T_name');
    }

    public function scopeAllAddressID($query)
    {
        $query->select('A_ID')->groupBy('A_ID');
    }

    public function scopeAddressID($query, $Adrs)
    {
        $query->where('A_ID','=',$Adrs)
            ->orderBy('id');
    }
}
