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
            );
    }

    public function parcels()
    {
        return $this->hasMany('App\Models\parcel', 'Sign_proof', 'T_name');
    }

    public function scopeAllAddressID($query)
    {
        $query->select('T_name')->groupBy('T_name');
    }

    public function scopeAddressID($query, $Adrs)
    {
        $query->where('T_name','=',$Adrs)
            ->orderBy('id');
    }
}
