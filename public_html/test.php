<?php
//COOKIES
$id = $_COOKIE['id'] ?? time();
$visits = ($_COOKIE['count_visit'] ?? 0) + 1;
setcookie('id', $id, time() + 3600);
setcookie('count_visit', $visits, time() + 3600);
$h1 = "Welcome user nr $id";
$h2 = "It's your $visits time on this website";

//SESSION
session_start();
$id_no = session_id();


if (isset($_SESSION['count'])) {
    $_SESSION['count'] = $_SESSION['count'] + 1;
} else {
    $_SESSION['count'] = 1;
}

$_SESSION['count'] = isset($_SESSION['count']) ? $_SESSION['count'] + 1 : 1;

$h1 = "Sveiki, Jums buvo priskirtas ID:  $id_no";
$h2 = "Jūs apsilankėte " .  $_SESSION['count'] . " kartus";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--<h1>--><?php //print $h1; ?><!--</h1>-->
<!--<h2>--><?php //print $h2; ?><!--</h2>-->

<h1><?php print $h1; ?></h1>
<h1><?php print $h2; ?></h1>


</body>
</html>