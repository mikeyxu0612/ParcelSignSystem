<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    /* protected  $table="addresses";*/
    protected $fillable = [
        'address',
        'B_ID',
        'phone',
        'created_at',
        'updated_at'
    ];


    public function scopeAllData($query)
    {
        $query->join('buildings', 'addresses.B_ID', '=', 'buildings.id')
            ->orderBy('addresses.id')
            ->select(
                'addresses.id',
                'addresses.address',
                'buildings.B_Name as Bname',
                'addresses.phone');
    }
    public function tenants()
    {
        return $this->hasMany('App\Models\tenant','A_ID','id');
    }
    public function Building()
    {
        return $this->belongsTo('App\Models\Building','B_ID','id');
    }
}
