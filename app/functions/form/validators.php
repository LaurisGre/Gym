<?php

use App\App;

/*================================*\
  # Form Validators
\*================================*/

/**
 * Checks if the given email-password combination exists in the database
 *
 * @param array $inputs
 * @param array $form
 * @return boolean
 */
function validate_login(array $inputs, array &$form): bool
{
    if (App::$db->getRowWhere('users', $inputs)) {
        return true;
    };

    $form['error'] = 'Plases check your password';

    return false;
}

/*================================*\
  # Field Validators
\*================================*/

/**
 * Checks if the new user's email is already in the database
 *
 * @param string $field_value
 * @param array $field
 * @return boolean
 */
function validate_user_unique(string $field_value, array &$field): bool
{
    if (App::$db->getRowWhere('users', ['email' => $field_value])) {
        $field['error'] = 'Email already taken, please use a different email';
        var_dump('FALSE');
        return false;
    };

    return true;
}

/**
 * Checks if the given input is in the designated length limits
 *
 * @param string $field_value
 * @param array $field
 * @param array $params
 * @return boolean
 */
function validate_text_length(string $field_value, array &$field, array $params): bool
{
    if (strlen($field_value) < $params['min'] || strlen($field_value) > $params['max']) {
        $field['error'] = strtr('Please check the input it must no more than  @max symbols', [
            '@min' => $params['min'],
            '@max' => $params['max'],
        ]);
        return false;
    }
    return true;
}

/**
 * Checks if the input only contains letters
 *
 * @param string $field_value
 * @param array $field
 * @return boolean
 */
function validate_field_only_letters(string $field_value, array &$field): bool
{
    if (!ctype_alpha($field_value)) {
        $field['error'] = 'Please only use letters, no symbols or numbers allowed';

        return false;
    }
    return true;
}

/**
 * Checks if the user is loged in
 *
 * @param array $form
 * @return boolean
 */
function validate_is_loged_in(array &$form): bool
{
    if (App::$session->getUser()) {
        $form['error'] = 'Please login to post a comment';

        return false;
    }

    return true;
}
