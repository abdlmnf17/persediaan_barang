<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = "barang_keluar";
    protected $fillable = [
        'id', 'nmcsbk', 'jnsbk', 'nobk', 'tglbk', 'memobk', 'jmbk' , 'idbk',
    ];
}
