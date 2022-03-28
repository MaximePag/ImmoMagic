<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfRealEstate extends Model
{
    protected $table = 'g5e1D_typeOfRealEstate';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};