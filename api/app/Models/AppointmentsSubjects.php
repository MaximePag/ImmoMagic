<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentsSubjects extends Model
{
    protected $table = 'g5e1D_appointmentsSubjects';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name'
    ];
};