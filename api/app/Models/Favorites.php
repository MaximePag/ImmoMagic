<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Favorites extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'id',
        'timestamp'];
}
