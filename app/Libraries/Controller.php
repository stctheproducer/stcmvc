<?php
namespace App\Libraries;

/**
 * Base Controller Class
 *
 * Loads the models and the views
 *
 * @author Chanda Mulenga <stconeten@gmail.com>
 */

class Controller
{
    /**
     * Returns a model class
     *
     * @param App\Models $model
     *
     * @return App\Models class
     */
    public function model($model)
    {
        return new App\Models . $model;
    }

    public function view($view, $data = [])
    {
        if (file_exists(__DIR__ . '/../views/' . $view . '.php')) {
            require_once __DIR__ . '/../views/' . $view . '.php';
        } else {
            die('View does not exist.');
        }
    }
}
