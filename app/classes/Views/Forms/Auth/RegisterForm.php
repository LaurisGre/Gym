<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_length' => [
                            'min' => 0,
                            'max' => 40,
                        ],
                        'validate_field_only_letters',
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your name here',
                        ],
                    ],
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_lenth' => [
                            'min' => 0,
                            'max' => 40,
                        ],
                        'validate_field_only_letters',
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your surname here',
                        ],
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_user_unique',
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your email here',
                        ],
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your password here',
                        ],
                    ],
                ],
                'phone_number' => [
                    'label' => 'Phone Number',
                    'type' => 'text',
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your phone number here',
                        ],
                    ],
                ],
                'address' => [
                    'label' => 'Home Address',
                    'type' => 'text',
                    'extras' => [
                        'attr' => [
                            'placeholder' => 'your home address here',
                        ],
                    ],
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register',
                    'type' => 'submit',
                    'extras' => [
                        'attr' => [
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
