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
        $data = [
            'app_name' => $this->config->get('config.app_name'),
            'app_root' => $this->config->get('config.app_root'),
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $this->view('pages/about');
    }
}
