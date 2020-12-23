<?php

namespace App\Controllers\Auth;

use App\App;

class LogoutController
{
    public function index()
    {
        App::$session->logout('/login');
    }
}
