<?php

namespace App\Controllers;

use App\Models\AnnouncesModel;

class Announces extends BaseController
{
    public function displayAnnouncesList()
    {
        $announces = new AnnouncesModel();
        $data['announcesList'] = $announces->getAnnounces();
        echo view('templates/header', ['title' => 'Liste des annonces']);
        echo view('pages/announcesList', $data);
        echo view('templates/footer');
    }

    //Va se déclencher si la page est visitée pour la première fois (formulaire non envoyé)
    public function createAnnouceForm()
    {
        echo view('templates/header', ['title' => 'Créer une annonce']);
        echo view('announces/addAnnounces');
        echo view('templates/footer');
    }

    public function createAnnounce()
    {
        $model = new AnnouncesModel();
        $data['formData'] = [
            'title' => $this->request->getPost('title'),
            'description'  => $this->request->getPost('description'),
            'creationDate'  => $this->request->getPost('creationDate'),
            'price' => $this->request->getPost('price'),
            'id_categories' => $this->request->getPost('id_categories')
        ];
        if ($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description'  => 'required|min_length[3]',
            'creationDate' => 'required',
            'price' => 'required',
            'id_categories' => 'required'
        ])) {
            $model->save($data['formData']);

            echo view('announces/success');
        } else {
            echo view('templates/header', ['title' => 'Créer une annonce']);
            echo view('announces/addAnnounces');
            echo view('templates/footer');
        }
    }
}
