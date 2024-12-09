<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
        ];

        return view('layout/header.php', $header) .
            view('home/home.php', [
                'search' => $_ENV['app_baseURL'] . '/search',
            ]) .
            view('layout/footer.html.php', [
                'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')' .  ' &copy;' . date('Y'),
            ]) .
            view('layout/footer.php');
    }

    public function searchMovie($search): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
        ];
        
        return view('layout/header.php', $header) .
            view('search/search.php', [
                'search'=> $search,
            ]) .
            view('layout/footer.html.php', [
                'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')' .  ' &copy;' . date('Y'),
            ]) .
            view('layout/footer.php');
    }
    
    public function searchSerie($search): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
        ];
        
        return view('layout/header.php', $header) .
            view('search/search.php', [
                'search'=> $search,
            ]) .
            view('layout/footer.html.php', [
                'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')' .  ' &copy;' . date('Y'),
            ]) .
            view('layout/footer.php');
    }
}
