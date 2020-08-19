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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<span><?php print $span; ?></span>
<div class="main">
    <?php for ($i = 1; $i <= $bokals; $i++): ?>
        <div class="bokal"></div>
    <?php endfor; ?>
</div>
</body
</html>