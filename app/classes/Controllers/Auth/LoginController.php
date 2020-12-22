<?php

namespace App\Controllers\Auth;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Auth\LoginForm;
use App\Controllers\GuestController;

class LoginController extends GuestController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();
        $this->page = new BasePage([
            'title' => 'Login',
        ]);
    }

    public function index()
    {
        if (App::$session->getUser()) {
            header('Location: /');
            exit();
        }

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            if (App::$session->login($clean_inputs['email'], $clean_inputs['password'])) {
                header('Location: /');
                exit();
            };
        };

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}
