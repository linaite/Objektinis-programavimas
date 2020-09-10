<?php
require('../bootloader.php');

$users = file_to_array(DB_FILE) ?: [];

if (is_logged_in($users)) {
    $message = "Sveikas prisijungęs, {$_SESSION['username']}!";
} else {
    header('Location: login.php');
    exit;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    img{
        width:400px;
    }
</style>
<body>
<!--if login print vardas else print bad-->
<?php if (isset($message)) : ?>
    <h1><?php print $message; ?></h1>
<?php endif; ?>
<img src="https://i0.wp.com/www.miske.lt/wp-content/uploads/2016/03/Bebras.jpg?fit=1600%2C1066&ssl=1" alt="bebras">
</body>
</html>


