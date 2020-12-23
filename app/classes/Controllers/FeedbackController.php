<?php

namespace App\Controllers;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\User\FeedbackForm;
use App\Views\Tables\FeedbackTable;
use Core\View;
use Core\Views\Link;

class FeedbackController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Feedback',
            'js' => ['/media/js/feedback.js']
        ]);
    }

    public function index()
    {
        if (App::$session->getUser()) {
            $form = (new FeedbackForm())->render();
        } else {
            $message = 'Please log in if you want to write a comment';

            $link = [
                'login' => (new Link([
                    'url' => App::$router::getUrl('login'),
                    'text' => 'Login',
                    'class' => 'login-link',
                ]))->render()
            ];
        }

        $content = (new View([
            'title' => 'Comments',
            'table' => (new FeedbackTable())->render(),
            'form' => $form ?? null,
            'message' => $message ?? null,
            'link' => $link ?? null,
        ]))->render(ROOT . '/app/templates/feedback.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
