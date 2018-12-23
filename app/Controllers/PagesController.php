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
    public function index()
    {
        $data = [
            'name' => 'chanda',
        ];
        $this->view('pages/index', ['name' => 'chanda']);
    }

    public function about()
    {
        $this->view('pages/about');
    }
}
