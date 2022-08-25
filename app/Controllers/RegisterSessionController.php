<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;


class RegisterSessionController extends BaseController
{

    use ResponseTrait;

    public function index()
    {
        $session = \Config\Services::session();

        $newdata = [
            'username'  => 'johndoe',
            'email'     => 'johndoe@some-site.com',
            'logged_in' => true,
        ];
        
        $session->set($newdata);
        header('Access-Control-Allow-Origin: *');
        // return var_dump($_SESSION['username']);
        return  $this->respond([
             'mesg' => 'bonjour',
             'dodo' => 'dodo',
             'data' => ($_SESSION['token'])
        ], 200);
    }
    public function look()
    {
        $session = \Config\Services::session();

        $item = $session->get('token');

        return  $this->respond([
            'mesg' => 'bonjour',
            'dodo' => 'ah oui',
            'data' => $item
       ], 200);
    }
}