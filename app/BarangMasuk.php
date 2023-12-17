<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = "barang_masuk";
    protected $fillable = [ 
        'id', 'nobm', 'jnsbm', 'tglbm', 'memobm', 'jmbm' 
    ]; 
}
