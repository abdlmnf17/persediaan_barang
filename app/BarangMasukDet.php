<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasukDet extends Model
{
    protected $table = "barang_masuk_det"; 
    protected $fillable = [ 
        'idbm', 'idakun', 'nilcr' 
    ]; 
}
