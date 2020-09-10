<?php
require('../bootloader.php');
// Unset all of the session variables.

if(!is_logged_in($users)){
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
    exit;
}
