<?php

namespace App\Controllers;

use App\App;

class GuestController
{
    protected $redirected = '/';

    public function __construct()
    {
        if (App::$session->getUser()) {
            header("Location: $this->redirected");
            exit();
        }
    }
}
