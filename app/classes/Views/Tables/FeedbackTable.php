<?php

namespace App\Views\Tables;

use Core\Views\Table;

class FeedbackTable extends Table
{
    public function __construct($rows = [])
    {
        parent::__construct([
            'headers' => [
                'Name',
                'Comment',
                'Date',
            ],
            'rows' => $rows,
            'id' => 'feedback-table',
        ]);
    }
}
