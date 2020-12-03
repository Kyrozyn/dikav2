<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_kendaraan';

    public function invoice(){
        return $this->hasMany('App\Models\pengiriman');
    }
}
