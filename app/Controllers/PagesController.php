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
            'app'  => $this->config->get('config.app_name'),
            'root' => $this->config->get('config.app_root'),
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $this->view('pages/about');
    }
}
