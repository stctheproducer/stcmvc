<?php
namespace App\Controllers;

use App\Libraries\Controller;

/**
 * Pages Controller Class
 *
 * Handles page URLs
 * @author Chanda Mulenga <stconeten@gmail.com>
 */

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->data + [
            'title' => 'SharePosts',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $this->view('pages/about');
    }
}
