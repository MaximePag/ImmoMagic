<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'g5e1D_cities';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'postalCode'
    ];
};