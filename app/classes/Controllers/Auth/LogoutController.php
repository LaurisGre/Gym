<?php

namespace App\Controllers\Common\Auth;

use App\App;

class LogoutController
{
    public function index()
    {
        App::$session->logout('/login');
    }
}
