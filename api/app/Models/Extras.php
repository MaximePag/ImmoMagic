<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extras extends Model
{
    protected $table = 'g5e1D_extras';
    public $timestamps = false;
    protected $fillable = [
        'id','name'
    ];
}
