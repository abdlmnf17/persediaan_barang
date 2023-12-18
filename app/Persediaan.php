<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $table = "persediaan";
    protected $fillable = [
        'idpr', 'nmpr', 'jnspr', 'jmlpr', 'id,'
    ];
}
