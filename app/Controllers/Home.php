<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $css = [
        'normalize.min.css',
        'mercury.min.css',
        'style.css',
    ];
    private $js = [
        'script.js',
    ];

    public function index(): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
            'css' => $this->css,
        ];
        $footer = [
            'js' => $this->js,
        ];

        return view('layout/header.php', $header) .
            view('home/home.php') .
            view('layout/footer.html.php', [
                'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')' .  ' &copy;' . date('Y'),
            ]) .
            view('layout/footer.php', $footer);
    }

    public function search(): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
            'css' => $this->css,
        ];
        $footer = [
            'js' => $this->js,
        ];
        
        return view('layout/header.php', $header) .
            view('home/home.php') .
            view('layout/footer.html.php', [
                'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')' .  ' &copy;' . date('Y'),
            ]) .
            view('layout/footer.php', $footer);
    }
}
