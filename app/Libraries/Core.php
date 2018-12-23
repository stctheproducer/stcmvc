<?php

namespace App\Libraries;

/**
 * App Core Class
 *
 * Creates URLs and loads core controller
 * @author Chanda Mulenga <stconeten@gmail.com>
 */

class Core
{
    protected $currentController = 'App\Controllers\Pages';
    protected $currentMethod     = 'index';
    protected $params            = [];
    public $test;

    public function __construct()
    {
        $url = $this->getUrl();

        // Check for the right controller
        if (class_exists("App\\Controllers\\" . ucwords($url[0]))) {
            $this->currentController = "App\\Controllers\\" . ucwords($url[0]);
            unset($url[0]);
        }

        $this->currentController = new $this->currentController;

        // Check for controller methods
    }

    /**
     * Returns the url after the domain from the browser as an array
     *
     * @return array
     */
    public function getUrl()
    {
        // if (isset($_GET['url'])) {
        //   $url = rtrim($_GET['url'], '/');
        //   $url = filter_var($url, FILTER_SANITIZE_URL);
        //   $url = explode('/', $url);
        //   return $url;
        // }
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = trim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
