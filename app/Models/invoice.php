<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $timestamps = false;
    public $primaryKey = 'id_invoice';
    public function pengiriman(){
        return $this->belongsToMany('App\Models\pengiriman','invoice_pengirimen')->withPivot(['posisix','posisiy','posisiz','volume','warna','width','length']);
    }

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\kendaraan','id_Kendaraan');
    }
}
