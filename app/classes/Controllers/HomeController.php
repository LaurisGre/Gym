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
        ]))->render(ROOT . '/app/templates/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
