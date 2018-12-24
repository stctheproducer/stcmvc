<?php
namespace App\Libraries;

use Dotenv\Dotenv;

/**
 * Base Controller Class
 *
 * Loads the models and the views
 *
 * @author Chanda Mulenga <stconeten@gmail.com>
 */

class Controller
{
    public $config;
    protected $paths = [];

    public function __construct()
    {
        // Set paths for config file and .env file
        $this->setupPaths();
        $this->config = new Config();
        $this->config->loadConfigurationFiles($this->paths['config_path'], $this->getEnvironment());
    }
    /**
     * Sets ups paths to needed files
     *
     * @return void
     */
    private function setupPaths()
    {
        $this->paths['env_file_path'] = dirname(dirname(__DIR__));
        $this->paths['env_file']      = $this->paths['env_file_path'] . '/.env';
        $this->paths['config_path']   = dirname(__DIR__) . '/config';
    }
    /**
     * Returns application environment
     *
     * @return void
     */
    private function getEnvironment()
    {
        if (is_file($this->paths['env_file'])) {
            $dotenv = new Dotenv($this->paths['env_file_path']);
            $dotenv->load();
        }
        return getenv('APP_ENV') ?: 'production';
    }
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
    /**
     * Returns a view
     *
     * @param View $view
     * @param array $data
     *
     * @return void
     */
    public function view($view, $data = [])
    {
        if (file_exists(__DIR__ . '/../views/' . $view . '.php')) {
            require_once __DIR__ . '/../views/' . $view . '.php';
        } else {
            die('View does not exist.');
        }
    }
}
