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

    protected $table = 'g5e1D_realEstate';
    /**
     * The attributes that are mass assignable.surface habitable
     *
     *
     * @var array
     */
    protected $fillable = [
        'id', 'address', 'price', 'expenses', 'description', 'numberOfViews', 'livingArea', 'landArea', 'roomNumber', 'bedroomNumber', 'bathroomNumber', 'toiletNumber', 'floorNumber', 'constructionYear', 'worksToBeDone', 'GES', 'DPE', 'archived',
        'id_g5e1D_typeOfRealEstate', 'id_g5e1D_typeOfWaterEvacuation', 'id_g5e1D_typeOfContract', 'id_g5e1D_cities', 'id_g5e1D_status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
     protected $hidden = [];
}
