<?php

namespace App\Views;

use Core\Views\Page;

class BasePage extends Page
{

    public function __construct($data)
    {
        $nav = new Navigation();
        parent::__construct($data + [
            'css' => [
                '/media/css/style.css'
            ],
            'js' => [],
            'header' => $nav->render(),
            'footer' => '© 2020 Laurynas Greska, all rights reserved',
        ]);
    }

    public function addCSS($link): void
    {
        $this->data['css'][] = $link;
    }

    public function addJS($link): void
    {
        $this->data['js'][] = $link;
    }

    public function setTitle($title): void
    {
        $this->data['title'] = $title;
    }

    public function setHeader($header): void
    {
        $this->data['header'] = $header;
    }

    public function setContent($content): void
    {
        $this->data['content'] = $content;
    }
}
