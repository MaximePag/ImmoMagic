<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = 'g5e1D_appointments';

    protected $fillable = [
        'id', 'dateHour', 'notes', 'id_g5e1D_users', 'id_g5e1D_realEstate', 'id_g5e1D_appointmentsSubjects', 'id_g5e1D_users_agentsCanHaveAppointments', 'archived'
    ];
};