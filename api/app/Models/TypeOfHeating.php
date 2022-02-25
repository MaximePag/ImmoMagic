<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfHeating extends Model
{
    protected $table = 'g5e1D_typeOfHeating';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};