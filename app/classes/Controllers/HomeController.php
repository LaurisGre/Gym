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
            'heading' => 'Welcome to our gym',
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
