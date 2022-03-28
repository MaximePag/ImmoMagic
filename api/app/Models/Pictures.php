<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    protected $table = 'g5e1D_pictures';

    protected $fillable = [
        'id', 'path', 'id_g5e1D_realEstate'
    ];
};