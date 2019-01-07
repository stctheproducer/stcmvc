<?php

namespace App\Models;

use App\Libraries\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Register user
    public function register($data)
    {
        $this->db->query('INSERT INTO users (first_name, other_names, last_name, email_address, password) VALUES (:first_name, :other_names, :last_name, :email_address, :password)');

        // Bind values
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':other_names', $data['other_names']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email_address', $data['email_address']);
        $this->db->bind(':password', $data['password']);

        // Execute SQL query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($email_address, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email_address = :email_address');
        $this->db->bind(':email_address', $email_address);

        $row = $this->db->getSingleRecord();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email_address)
    {
        $this->db->query('SELECT * from users WHERE email_address = :email_address');

        // Bind value
        $this->db->bind(':email_address', $email_address);

        $row = $this->db->getSingleRecord();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
