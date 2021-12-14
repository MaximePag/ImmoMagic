<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncesModel extends Model
{
    protected $allowedFields = ['title', 'description', 'creationDate', 'price', 'id_categories'];

    protected $table = 'announces';

    public function getAnnounces()
    {
        return $this->asArray()->findAll();
    }
}
