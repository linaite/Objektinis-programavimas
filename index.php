<?php
$money = rand(1, 15);
$bokal_cost = 3;
$bokal_count = floor($money / $bokal_cost);
$money_spent = $bokal_count * $bokal_cost;
$p = "Viso sumokėta $money_spent eur"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alus</title>
    <style>
        .beer-line {
            display: flex;
            align-items: center;
        }

        .beer-images {
            display: flex;
        }

        .beer {
            background-position: center;
            background-size: cover;
            width: 100px;
            height: 100px;
        }

        .empty {
            background-image: url("https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Ffarm9.staticflickr.com%2F8135%2F8794910359_39dfcb1f56_c.jpg&f=1&nofb=1;");
        }

        .full {
            background-image: url("https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2F1.bp.blogspot.com%2F-Ht7b9u8y7z8%2FUBkvmVbhKMI%2FAAAAAAAAF8w%2Frw_RXFF83VA%2Fs1600%2FBeer_Wallpaper%2B(62).jpg&f=1&nofb=1");
        }
    </style>
</head>
<body>
<div class="beer-lines">
    <?php for ($m = 3; $m <= $money_spent; $m += $bokal_cost): ?>
        <div class="beer-line">
            <div class="info">
                <?php print "$m Eur"; ?>
            </div>
            <div class="beer-images">
                <?php for ($b = $m; $b > 0; $b -= $bokal_cost): ?>
                    <div class="beer <?php print $b == 3 ? 'full' : 'empty'; ?>"></div>
                <?php endfor; ?>
            </div>
        </div>
    <?php endfor; ?>
</div>
<p><?php print $p; ?></p>
</body>
