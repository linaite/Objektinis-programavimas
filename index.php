<?php
$distance = rand(1000, 2000);
$consumption = 7.5;
$price_1 = 1.3;

$fuel_total = $distance * $consumption/ 100;
$price_trip = $fuel_total * $price_1;
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
<body>
<h1>Kelionės skaičiuoklė</h1>
<ul>
    <li><?php print "$distance km."; ?></li>
    <li><?php print round($fuel_total) . ' l/100 km.'; ?></li>
    <li><?php print round($price_trip) . ' Eur/l'; ?></li>
</ul>
</body>
</html>
