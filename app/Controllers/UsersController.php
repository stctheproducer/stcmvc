<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Helpers\UrlRedirect;
use App\Libraries\Controller;
use App\Models\User;

/**
 * Users Controller Class
 *
 * Handles user authentication
 * @author Chanda Mulenga <stconeten@gmail.com>
 */
class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User; // $this->model('User');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = $this->data + [
                'title'                => 'Create an Account',
                'first_name'           => ucfirst(trim($_POST['first_name'])),
                'other_names'          => ucfirst(trim($_POST['other_names'])),
                'last_name'            => ucfirst(trim($_POST['last_name'])),
                'email_address'        => trim($_POST['email_address']),
                'password'             => trim($_POST['password']),
                'confirm_password'     => trim($_POST['confirm_password']),
                'first_name_err'       => '',
                'other_names_err'      => '',
                'last_name_err'        => '',
                'email_address_err'    => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            // Validate email
            if (empty($data['email_address'])) {
                $data['email_address_err'] = 'Please enter email';
            } elseif (!preg_match('/([\w\d\.\_\-]+)@([\w\d\.\-\_]+)\.([\w\d]{2,64})/', $data['email_address'])) {
                $data['email_address_err'] = 'Please enter a valid email address';
            } else {
                // Check if email exists
                if ($this->userModel->findUserByEmail($data['email_address'])) {
                    $data['email_address_err'] = 'That email address is already in use';
                }
            }

            // Validate first name
            if (empty($data['first_name'])) {
                $data['first_name_err'] = 'Please enter your first name';
            } elseif (!preg_match('/(\w{2,50})/', $data['first_name'])) {
                $data['first_name_err'] = 'Please enter a valid name';
            }

            // Validate other names
            if (!empty($data['other_names']) && !preg_match('/([\w\s]{2,100})/', $data['other_names'])) {
                $data['other_names_err'] = 'Please enter a valid name';
            }

            // Validate last name
            if (empty($data['last_name'])) {
                $data['last_name_err'] = 'Please enter your last name';
            } elseif (!preg_match('/(\w{2,100})/', $data['last_name'])) {
                $data['last_name_err'] = 'Please enter a valid name';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (!preg_match('/([\w\d!@#\$%\^&\-\_]{8,})/', $data['password'])) {
                $data['password_err'] = 'Please enter a password with at least 8 characters';
            }

            // Validate password confirmation
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'The passwords do not match!';
                }
            }

            // Make sure errors are empty
            if (empty($data['first_name_err']) && empty($data['other_names_err']) && empty($data['last_name_err']) && empty($data['email_address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user
                if ($this->userModel->register($data)) {
                    Session::flash('register_success', 'You are registered and can now login');
                    UrlRedirect::redirect($this->data['app_url'], 'users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }

        } else {
            // Initialize data
            $data = $this->data + [
                'title'                => 'Create an Account',
                'first_name'           => '',
                'other_names'          => '',
                'last_name'            => '',
                'email_address'        => '',
                'password'             => '',
                'confirm_password'     => '',
                'first_name_err'       => '',
                'other_names_err'      => '',
                'last_name_err'        => '',
                'email_address_err'    => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = $this->data + [
                'title'             => 'Log Into Account',
                'email_address'     => trim($_POST['email_address']),
                'password'          => trim($_POST['password']),
                'email_address_err' => '',
                'password_err'      => '',
            ];

            // Validate email
            if (empty($data['email_address'])) {
                $data['email_address_err'] = 'Please enter email';
            } elseif (!preg_match('/([\w\d\.\_\-]+)@([\w\d\.\-\_]+)\.([\w\d]{2,64})/', $data['email_address'])) {
                $data['email_address_err'] = 'Please enter a valid email address';
            } else {
                // Check if user/email exists
                if ($this->userModel->findUserByEmail($data['email_address'])) {
                    // User found
                } else {
                    $data['email_address_err'] = 'No user found!';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (!preg_match('/([\w\d!@#\$%\^&\-\_]{8,})/', $data['password'])) {
                $data['password_err'] = 'Please enter a password with at least 8 characters';
            }

            // Make sure errors are empty
            if (empty($data['email_address_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email_address'], $data['password']);

                if ($loggedInUser) {
                    // Create session variables
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }

            } else {
                $this->view('users/login', $data);
            }

        } else {
            // Initialize data
            $data = $this->data + [
                'title'             => 'Log Into Account',
                'email_address'     => '',
                'password'          => '',
                'email_address_err' => '',
                'password_err'      => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        Session::set('user_id', $user->id);
        Session::set('user_email_address', $user->email_address);
        Session::set('user_first_name', $user->first_name);
        $user->other_names ? Session::set('user_other_names', $user->other_names) : null;
        Session::set('user_last_name', $user->last_name);
        UrlRedirect::redirect($this->data['app_url'], 'pages/index');
    }

    public function logout()
    {
        Session::delMany([
            'user_id',
            'user_email_address',
            'user_first_name',
            'user_last_name',
            'user_other_names',
        ]);
        Session::destroy();
        UrlRedirect::redirect($this->data['app_url'], 'users/login');
    }

    public function isLoggedIn()
    {
        if (check('user_id')) {
            return true;
        } else {
            return false;
        }
    }
}
