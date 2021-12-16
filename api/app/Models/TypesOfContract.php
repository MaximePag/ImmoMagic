<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypesOfContract extends Model
{
    protected $table = 'typesOfContract';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};