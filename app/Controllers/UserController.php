<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;


class UserController extends BaseController
{

    use ResponseTrait;

    public function index()
    {
        // header('Access-Control-Allow-Origin: *');
        $users = new UserModel;
        return $this->respond(['users' => $users->findAll()], 200);
    }
}