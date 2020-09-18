<?php
/**
 * Check if user is logged in
 *
 * @return bool
 */
//function is_logged_in(): bool
//{
//    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
//
//        $users_db = new FileDB(DB_FILE);
//        $users_db->load();
//
//        if ($users_db->getRowsWhere('users', ['username' => $_SESSION['username'], 'password' => $_SESSION['password']])) {
//            return true;
//        }
//        return false;
//    }
//}
function is_logged_in(): bool
{
    $users_db = new FileDB(DB_FILE);
    $users_db->load();
    if (empty($_SESSION)) {
        return false;
    } else {
        if ($users_db->getRowsWhere('users', ['username' => $_SESSION['username'], 'password' => $_SESSION['password']])) {
            return true;
        }
    }
    return false;
}


function logout($redirect = false)
{
    setcookie('PHPSESSID', null, -1);
    session_destroy();
    $_SESSION = [];
    if ($redirect) {
        header('Location: login.php');
        exit;
    }
}
