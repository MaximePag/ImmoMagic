<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'g5e1D_documents';

    protected $fillable = [
        'id', 'title', 'path', 'archived', 'id_g5e1D_users'
    ];
};