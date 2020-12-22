<?php

namespace App\Views\Forms\User;

use Core\Views\Form;

class FeedbackForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'text' => [
                    'label' => 'Comment',
                    'type' => 'textarea',
                    'value' => '',
                    'validators' => [
                        // 'validate_field_not_empty',
                        // 'validate_field_length' => [
                        //     'min' => 0,
                        //     'max' => 500,
                        // ],
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your comment here',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                    'type' => 'submit',
                    'extras' => [
                        'attr' => [
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
            'validators' => [
                // 'validate_is_loged_in'
            ],
        ]);
    }
}
