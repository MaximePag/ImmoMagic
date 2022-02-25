<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'g5e1D_roles';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};