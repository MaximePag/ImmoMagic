<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypesOfHeating extends Model
{
    protected $table = 'typesOfHeating';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};