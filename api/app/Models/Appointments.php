<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    // protected $guarded =[] => to allow the web pp to fill any column on the table
    protected $fillable = ['dateHour', 'notes'];
}
