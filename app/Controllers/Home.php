<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $css = [
        'normalize.min.css',
        'mercury.min.css',
    ];
    private $js = [];

    public function index(): string
    {
        echo view('layout/header', ['css' => $this->css]);
        echo view('home/home');
        return view('layout/footer', ['js' => $this->js]);
    }
}
