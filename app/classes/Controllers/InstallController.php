<?php

namespace App\Controllers;

use App\App;

class InstallController
{
    public function index()
    {
        session_destroy();

        App::$db->dropTable('users');
        App::$db->createTable('users');
        App::$db->insertRow('users', [
            'name' => 'User0',
            'surname' => 'User0',
            'email' => 'user@mail.com',
            'password' => 'user',
            'phone_number' => '',
            'address' => '',
        ]);
        App::$db->dropTable('feedback');
        App::$db->createTable('feedback');
        App::$db->save();
    }
}
