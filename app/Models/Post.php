<?php

namespace App\Models;

use App\Libraries\Database;

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query("SELECT * FROM posts");

        return $this->db->getRecordSet();
    }
}
