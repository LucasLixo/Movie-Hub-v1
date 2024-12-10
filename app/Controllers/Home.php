<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $request;
    protected $helpers = ['form', 'html', 'help'];

    /**
     * Minify HTML content.
     *
     * @param string $buffer
     * @return string
     */
    private function minifier(string $buffer): string
    {
        $search = [
            '/\>[^\S ]+/s', // Remove spaces after tags
            '/[^\S ]+\</s', // Remove spaces before tags
            '/(\s)+/s', // Collapse multiple spaces
            '/<!--(.|\s)*?-->/' // Remove comments
        ];

        $replace = [
            '>',
            '<',
            '\\1',
            ''
        ];

        return preg_replace($search, $replace, $buffer);
    }

    /**
     * Render a page.
     *
     * @param string $contentView
     * @param array $pageData
     * @return string
     */
    private function renderPage(string|null $contentView, array $pageData = []): string
    {
        $header = [
            'title' => $_ENV['APP_TITLE'],
        ];

        $footer = [
            'message' => $_ENV['APP_TITLE'] . ' - v(' . $_ENV['APP_VERSION'] . ')',
            'date' => date('Y'),
        ];

        $html = view('layout/header.php', $header) .
            view('layout/header.html.php', $header) .
            (($contentView != null) ? view($contentView, $pageData) : '<div style="display: block; height: 16rem;"></div>') .
            view('layout/footer.html.php', $footer) .
            view('layout/footer.php');

        return $this->minifier($html);
    }

    private function apiSearchText(string $type, string $search, int $page = 1)
    {
        $client = \Config\Services::curlrequest();

        $params = [
            'type' => $type,
            'r' => 'json',
            'page' => $page,
            's' => $search,
        ];

        $response = $client->get($_ENV['APP_API'] . '&' . http_build_query($params));

        return json_decode($response->getBody(), true);
    }
    
    private function apiSearchImdb(string $type, string $imdb)
    {
        $client = \Config\Services::curlrequest();

        $params = [
            'type' => $type,
            'r' => 'json',
            'i' => $imdb,
        ];

        $response = $client->get($_ENV['APP_API'] . '&' . http_build_query($params));

        return json_decode($response->getBody(), true);
    }

    /**
     * Index page.
     *
     * @return string
     */
    public function index(): string
    {
        // Apenas permite requisições GET
        if ($this->request->getMethod() !== 'GET') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pageData = [
            'form' => [
                'method' => 'GET',
            ],
            'input' => [
                'type' => 'text',
                'value' => null,
                'name' => 'search',
                'id' => 'search',
                'maxlength' => '32',
                'autocomplete' => 'false',
                'autocapitalize' => 'true',
            ],
            'dropdown' => [
                'movie' => 'Movie',
                'serie' => 'Serie',
            ],
            'selected' => 'movie',
            'select' => [
                'name' => 'type',
                'id' => 'type',
            ],
        ];

        return $this->renderPage('home/home.php', $pageData);
    }

    /**
     * Search for a movie.
     *
     * @param string $search
     * @return string
     */
    public function searchMovie(int $page, string $search): string
    {
        // Apenas permite requisições GET
        if ($this->request->getMethod() !== 'GET') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Validação CSRF
        if (! $this->validateCSRF()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if($page < 1) {
            return $this->renderPage(null);
        }

        $pageData = [
            'search' => $search,
            'results' => $this->apiSearchText('movie', $search, $page),
            'page' => $page,
            'search' => $search,
        ];

        if($pageData['results']['Response'] != 'True') {
            return $this->renderPage(null);
        }
        
        return $this->renderPage('search/movie.php', $pageData);
    }

    /**
     * Search for a series.
     *
     * @param string $search
     * @return string
     */
    public function searchSerie(int $page, string $search): string
    {
        // Apenas permite requisições GET
        if ($this->request->getMethod() !== 'GET') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Validação CSRF
        if (! $this->validateCSRF()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pageData = [
            'search' => $search,
        ];

        return $this->renderPage('search/serie.php', $pageData);
    }

    /**
     * Verifica se o CSRF é válido
     *
     * @return bool
     */
    private function validateCSRF(): bool
    {
        // $token = $this->request->getGet('_csrf_token');
        // return csrf_hash() === $token;
        return true;
    }

    public function detailsMovie($id): string
    {
        $imdb = aesDecrypt($id);

        if ($imdb  == -1) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        echo '<pre>';
        var_dump($this->apiSearchImdb('movie', $imdb));
        echo '</pre>';
        die(1);

        return $imdb;
    }

    public function detailsSerie($id): string
    {
        $imdb = aesDecrypt($id);

        if ($imdb == -1) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $imdb;
    }
}
