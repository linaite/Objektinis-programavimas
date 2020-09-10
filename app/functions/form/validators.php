<?php
/**
 * * Validates unique users
 *
 * @param string $field_value
 * @param $field
 * @return bool
 */
function validate_user_unique(string $field_value, &$field)
{
    $users = file_to_array(DB_FILE) ?: [];
//    var_dump($users);

    foreach ($users as $user) {
        if ($field_value === $user['username']) {
            $field['error'] = 'Toks vartotojas jau egzistuoja';
            return false;
        }
    }
    return true;
}

