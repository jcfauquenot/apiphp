<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Resultat extends BaseController
{
    public function index()
    {
        //
        $session = \Config\Services::session();

        echo($_SESSION['token']);

    }
}
