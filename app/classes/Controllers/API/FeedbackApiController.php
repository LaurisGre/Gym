<?php

namespace App\Controllers\API;

use App\App;
use App\Views\Forms\User\FeedbackForm;
use Core\Api\Response;

class FeedbackApiController
{
    public function index(): ?string
    {
        $response = new Response();
        $rows = $this->createRows();
        $response->setData($rows);

        return $response->toJson();
    }

    private function createRows(): ?array
    {
        $data = App::$db->getRowsWhere('feedback');

        foreach ($data as $id => &$row) {
            $row = [
                'name' => App::$db->getRowById('users', $row['user_id'])['name'],
                'text' => $row['text'],
                'timestamp' => $this->calcTime($row['timestamp']),
            ];
        }

        return $data;
    }

    private function calcTime($timestamp): ?string
    {
        return date('Y-m-d', $timestamp);;
    }


    public function create(): ?string
    {
        $response = new Response();
        $form = new FeedbackForm();

        if ($form->validate()) {
            $id = (array_key_first(App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']])));
            App::$db->insertRow('feedback', [
                'user_id' => $id,
                'timestamp' => time(),
                'text' => $form->values()['text'],
            ]);
        }

        return $response->toJson();
    }
}
