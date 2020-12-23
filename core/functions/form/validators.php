<?php

/*================================*\
  # Field Validators
\*================================*/

/**
 * Checks if the field is not empty
 *
 * @param string $field_value
 * @param array $field
 * @return boolean
 */
function validate_field_not_empty(string $field_value, array &$field): bool
{
    if ($field_value === '') {
        $field['error'] = 'Please fill out the required fields';
        return false;
    }
    return true;
}

/**
 * Checks if the given value is in the correct email format
 *
 * @param string $field_value
 * @param array $field
 * @return boolean
 */
function validate_email(string $field_value, array &$field): bool
{
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $field_value)) {
        $field['error'] = 'Please check if the given email is in valid format';
        return false;
    }
    return true;
}
