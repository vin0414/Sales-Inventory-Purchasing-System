<?php

namespace App\Controllers;
use App\Libraries\Hash;
class User extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['form']);
        $this->db = db_connect();
    }

    public function overview()
    {
        return view('user/overview');
    }
}