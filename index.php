<?php

$game = [
    'player' => [
        'health' => rand(1, 100),
        'armour' => rand(1, 100),
        'wanted_level' => 0,
        'money' => 1000,
    ],
    'game' => ['time' => date("G:i "),],
    'objects' => [
        [
            'x' => 50,
            'y' => 2,
            'class' => 'car',
        ],
        [
            'x' => 30,
            'y' => 10,
            'class' => 'ballas',
        ],
        [
            'x' => 6,
            'y' => 0,
            'class' => 'motorcycle',
        ],
        [
            'x' => 80,
            'y' => 0,
            'class' => 'girl',
        ],
    ],
    'hud' => [
        'money' => '',
    ],
    'weapons' => [
        [
            'name' => 'Dildo',
            'type' => 'melee',
            'active' => false,
            'damage' => 5,
            'class' => 'dildo'
        ],
        [
            'name' => 'Bat',
            'type' => 'melee',
            'active' => false,
            'damage' => 10,
            'class' => 'bat'
        ],
        [
            'name' => 'Desert Eagle',
            'type' => 'pistols',
            'active' => false,
            'ammo' => rand(10, 50),
            'damage' => 55,
            'class' => 'desert-eagle'
        ]
    ],
];

foreach ($game['objects'] as $key => $object) {
//      $x = true;
//      $y = !$x;

    $object['on_fire'] = rand(true, false);
    settype($object['on_fire'], "boolean");
    $object['is_target'] = !$object['on_fire'];
//      if ($object['on_fire']) {
//          $object['class'] .= ' fire';
//      }
//
//      if ($object['is_target']) {
//          $object['class'] .= ' target';
//      }

    $object['class'] .= ' ' . ($object['on_fire'] ? 'fire' : 'target');
    $game['objects'][$key] = $object;

    $game['player']['money'] += $object['on_fire'] ? 200 : 0;

    $game['player']['wanted_level'] += $object['on_fire'] ? 1 : 0;
}
$game['hud']['money'] = '$' . str_pad($game['player']['money'], 8, '0', STR_PAD_LEFT);

$game['weapons'][rand(0, 2)]['active'] = true; // NUSTATOM RANDOM GINKLA

foreach ($game['weapons'] as $weapon) {
    if ($weapon['active']) {
        $game['player']['weapon'] = $weapon['class'];
    }
}

//var_dump($game);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pricedown bl.ttf">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <title>Game</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .bg {
            background-image: url("https://www.gta-5.com/wp-content/uploads/2013/09/vinewood-streets-background.jpg");
            background-size: cover;
            min-height: 100vh;
            position: relative;
        }

        .object {
            position: absolute;
            background-size: contain;
            background-repeat: no-repeat;
            background-position-y: bottom;
        }

        .car {
            background-image: url('images/car.png');
            width: 400px;
            height: 250px;
        }

        .ballas {
            background-image: url('images/ball.png');
            height: 100px;
            width: 100px;
        }

        .girl {
            background-image: url('images/girl.png');
            height: 500px;
            width: 250px;
        }

        .motorcycle {
            background-image: url('images/motorcycle.png');
            width: 300px;
            height: 250px;
        }

        .fire {
            content: url("images/fire.png");
        }

        .target {
            content: url("images/target.png");
        }

        .card {
            position: absolute;
            background-color: white;
            border: 3px solid black;
            padding: 15px;
            top: 10px;
            left: 10px;
            width: 250px;
            font-family: Pricedown;
            font-size: 2.3em;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
        }

        .top {
            display: flex;
            margin-bottom: 10px;
        }

        .top img {
            margin-right: 10px;
            width: 90px;
            height: 90px;
        }

        .top div {
            width: 100%;
        }

        .bar {
            background-color: lightgray;
            border: 2px solid black;
            box-sizing: border-box;
        }

        .bg_white {
            background-color: white;
        }

        .bg_red {
            background-color: red;
        }

        .fa-star {
            font-size: 25px;
        }

        .dildo {
            background: url("images/1.png");
        }

        .bat {
            background: url("images/2.png");
        }

        .desert-eagle {
            background: url("images/3.png");
        }

        .hud-weapon {
            width: 90px;
            height: 90px;
            background-size: contain;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
<div class="bg">
    <?php foreach ($game['objects'] as $object): ?>
        <div class="object <?php print $object['class']; ?>"
             style="bottom: <?php print $object['y']; ?>%; left: <?php print $object['x']; ?>%;">
        </div>
    <?php endforeach; ?>
    <div class="card">
        <div class="top">
            <div class="hud-weapon <?= $game['player']['weapon'] ?>"></div>
            <div>
                <span><?php print $game['game']['time']; ?></span>
                <div class="bar">
                    <div class="bg_white" style="height:20px;width:<?php print $game['player']['armour']; ?>%"></div>
                </div>
            </div>
        </div>
        <div class="bar">
            <div class="bg_red" style="height:21px;width:<?php print $game['player']['health']; ?>%"></div>
        </div>
        <span><?php print $game['hud']['money']; ?></span>
        <div>
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <i class="<?php print  $game['player']['wanted_level'] < $i ? 'far' : 'fas'; ?>  fa-star"></i>
            <?php endfor; ?>
        </div>
    </div>
</div>
</body>
</html>