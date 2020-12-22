<?php

namespace App\Views\Tables;

use App\App;
use Core\Views\Table;

class FeedbackTable extends Table
{
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('orders');

        parent::__construct([
            'headers' => [
                'Name',
                'Comment',
                'Date',
            ],
            'rows' => $rows
        ]);
    }

}