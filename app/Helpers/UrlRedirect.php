<?php

namespace App\Helpers;

class UrlRedirect
{
    // Simple page redirect
    public function redirect($app_url, $page)
    {
        header('location: ' . $app_url . '/' . $page);
    }
}
