<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypesOfWaterEvacuation extends Model
{
    protected $table = 'typesOfWaterEvacuation';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};