<?php
require('../bootloader.php');

$users = file_to_array(DB_FILE);
//var_dump($users);


$table = [
    'headers' => [
        'Email',
        'Password',
    ],
    'rows' => $users,
];


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style_t.css">
<title>Table</title>
</head>
<body>
<main>
    <?php include('../core/templates/table.tpl.php'); ?>
</main>
</body>
</html>