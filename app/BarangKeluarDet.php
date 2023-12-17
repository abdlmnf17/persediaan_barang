<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarDet extends Model
{
    protected $table = "barang_keluar_det"; 
    protected $fillable = [ 
        'id', 'nilcr' 
    ]; 
}
