<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        echo view('templates/header', ['title' => 'Immo\'Magic']);
        echo view('home');
        echo view('templates/footer');
    }
}
