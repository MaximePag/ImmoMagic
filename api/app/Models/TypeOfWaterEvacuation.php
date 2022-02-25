<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfWaterEvacuation extends Model
{
    protected $table = 'g5e1D_typeOfWaterEvacuation';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};