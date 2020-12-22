<?php

namespace App\Controllers;

use App\App;
use App\Views\BasePage;
use Core\View;

class HomeController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Home',
            'js' => ['/media/js/home.js']
        ]);
    }

    public function index(): ?string
    {
        $user = App::$session->getUser();

        $content = (new View([
            'heading' => 'This is the HomePage',
            'services' => [
                [
                    'img' => 'service1 img',
                    'name' => 'service1 name here',
                    'description' => 'service1 description'
                ],
                [
                    'img' => 'service2 img',
                    'name' => 'service2 name here',
                    'description' => 'service2 description'
                ],
                [
                    'img' => 'service3 img',
                    'name' => 'service3 name here',
                    'description' => 'service3 description'
                ],
            ]
        ]))->render(ROOT . '/app/templates/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
