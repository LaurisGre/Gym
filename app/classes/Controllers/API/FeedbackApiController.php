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

        $data = App::$db->getRowsWhere('feedback');
        $rows = $this->createRows($data);

        $response->setData($rows);

        return $response->toJson();
    }

    private function createRows($data): ?array
    {

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

            $user_id = (array_key_first(App::$db->getRowsWhere('users', ['email' => App::$session->getUser()['email']])));

            $row = [
                'user_id' => $user_id,
                'text' => $form->values()['text'],
                'timestamp' => time(),
            ];

            App::$db->insertRow('feedback', $row);

            $new_row = [
                'name' => App::$db->getRowWhere('users', ['email' => App::$session->getUser()['email']])['name'],
                'text' => $row['text'],
                'timestamp' => $this->calcTime(time()),
            ];
        }

        $response->setData($new_row);
        return $response->toJson();
    }
}
