<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        echo view('parts/header', ['title' => 'un titre']);
        echo view('home');
        echo view('parts/footer');
    }
}
