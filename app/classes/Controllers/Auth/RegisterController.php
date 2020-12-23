<?php

namespace App\Controllers\Auth;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Auth\RegisterForm;
use App\Controllers\GuestController;

class RegisterController extends GuestController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForm();
        $this->page = new BasePage([
            'title' => 'Register',
        ]);
    }

    public function index()
    {
        var_dump($this->form->values());
        var_dump($this->form->validate());
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->insertRow('users', $clean_inputs);
            header("Location:login");
        };

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}
