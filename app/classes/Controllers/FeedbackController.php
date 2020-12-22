<?php

namespace App\Controllers;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\User\FeedbackForm;
use App\Views\Tables\FeedbackTable;
use Core\View;

class FeedbackController
{
    protected $page;
    protected FeedbackForm $form;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Feedback',
            'js' => ['/media/js/feedback.js']
        ]);
        $this->form = new FeedbackForm();
    }

    public function index()
    {
        $user = App::$session->getUser();

        if ($this->form->validate()) {

        }

        $table = new FeedbackTable();
        $content = (new View([
            'title' => 'Check out our comments',
            'tables' => ['feedback_table' => $table->render()],
            'forms' => ['feedback_form' => (new FeedbackForm())->render()],
        ]))->render(ROOT . '/app/templates/feedback.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
