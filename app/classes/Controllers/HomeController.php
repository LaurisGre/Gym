<?php

namespace App\Controllers;

use App\Views\BasePage;
use Core\View;

class HomeController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Home',
        ]);
    }

    public function index(): ?string
    {
        $content = (new View([
            'title' => 'Welcome to the GYM!',
            'services' => [
                [
                    'img' => 'serv1',
                    'name' => 'Personal trainer',
                    'description' => 'Need some advice, want to try a new training programme? Book a session with one of our best Trainers'
                ],
                [
                    'img' => 'serv2',
                    'name' => 'Rent our space',
                    'description' => 'Would you like to organise a physicall tournament and don\'t have the space for it? Look no further!'
                ],
                [
                    'img' => 'serv3',
                    'name' => 'Equipment renting',
                    'description' => 'Don\'t have time to visit the gym? Rent some equipment to use at home.  Shipping included!'
                ],
            ]
        ]))->render(ROOT . '/app/templates/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
