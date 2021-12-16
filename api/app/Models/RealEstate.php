<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class RealEstate extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'realEstate';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adress', 'price', 'expenses', 'description', 'numberOfViews', 'livingArea', 'landArea', 'livingRoomArea', 'roomNumber', 'bedroomNumber', 'bathroomNumber', 'toiletNumber', 'floorNumber', 'garage', 'parking', 'constructionYear', 'worksToBeDone', 'GES', 'DPE', 'archives'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
     protected $hidden = [];
}