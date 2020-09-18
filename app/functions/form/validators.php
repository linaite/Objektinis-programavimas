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
//    $users = file_to_array(DB_FILE) ?: [];
//    var_dump($users);

    $users_db = new FileDB(DB_FILE);
    $users_db->load();

    if ($users_db->getRowsWhere('users', ['username' => $field_value])) {
        $field['error'] = 'Toks useris jau egzistuoja';
        return false;
    }
    return true;
}

/**
 * Validates login
 *
 * @param array $form_values
 * @param array $form
 * @return bool
 */
function validate_login(array $form_values, array &$form): bool
{
    $users_db = new FileDB(DB_FILE);
    $users_db->load();

    if ($users_db->getRowsWhere('users', ['username' => $form_values['username'], 'password' => $form_values['password']])) {
        $_SESSION['username'] = $form_values['username'];
        $_SESSION['password'] = $form_values['password'];
        return true;
    }

    return false;
}

/**
 * Validates unique pixel
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_pixels_unique($form_values, array &$field): bool
{
    $pixels_db = new FileDB(DB_FILE);
    $pixels_db->load();

    if ($pixels_db->getRowsWhere('pixels', ['x' => $form_values['x'], 'y' => $form_values['y']])) {
        $field['error'] = 'Norimas pikselis jau užimtas';
        return false;
    }
    return true;
}






