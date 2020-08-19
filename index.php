<?php
$money = rand(0, 15);
$bokal_cost = 3;

$bokals = $money / $bokal_cost;
$span = "$money eurai " . floor($bokals) . ' bokalai';
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
    .main {
        display: flex;
    }

    .bokal {
        background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTEdd932N2jqR--HHB6tOli42z2AtZQTYTzGg&usqp=CAU");
        background-position: center;
        width: 200px;
        height: 200px;
    }
</style>
<body>
<span><?php print $span; ?></span>
<div class="main">
    <?php for ($i = 1; $i <= $bokals; $i++): ?>
        <div class="bokal"></div>
    <?php endfor; ?>
</div>
</body
</html>