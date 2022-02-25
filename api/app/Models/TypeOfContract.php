<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfContract extends Model
{
    protected $table = 'g5e1D_typeOfContract';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};