<?php

$game = [
    'objects' => [
        [
            'x' => 50,
            'y' => 2,
            'class' => 'car',
        ],
        [
            'x' => 22,
            'y' => 4,
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
    'huds' => [
        [
            'time' => date("h:i"),
            'bar_1' => rand(1, 100),
            'bar_2' => rand(1, 100),
            'weapon' => rand(1, 3),
            'money' => 1000 + 200,
            'stars' => 1,
        ],
    ],
];

foreach ($game['objects'] as $key => $object) {
//      $x = true;
//      $y = !$x;

    $object['on_fire'] = rand(true, false);
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

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            max-width: 100vw;
            position: relative;
        }

        .object {
            position: absolute;
            background-size: contain;
            background-repeat: no-repeat;
            background-position-y: bottom;
        }

        .car {
            background-image: url('https://ksd-images.lt/display/aikido/store/041bde01e5cb11d6dd3edc780d7eced1.jpg');
            width: 250px;
        }

        .ballas {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ec/Soccer_ball.svg');
            height: 250px;
        }

        .girl {
            background-image: url('https://www.urmas.net/wp-content/uploads/2016/02/6997496-beautiful-girl-fashion-look.jpg');
            height: 250px;
        }

        .motorcycle {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSX4Rafo7Hd2v7FpMzqV0wsi0VP-5WgI8embA&usqp=CAU');
            width: 200px;
        }

        .fire {
            content: url("https://w0.pngwave.com/png/573/316/flame-fire-flame-fire-png-clip-art.png");
        }

        .target {
            content: url("https://upload.wikimedia.org/wikipedia/commons/c/c5/Target_Corporation_logo_%28vector%29.svg");
        }

        .card {
            position: absolute;
            background-color: white;
            padding: 10px;
            top: 10px;
            left: 10px;
            width: 250px;
            border-radius: 5px;
        }

        .sec_1 img {
            margin-right: 10px;
            width: 50px;
            height: 50px;
        }

        .sec_1 {
            display: flex;
            width: 100%;
        }

        .progress_bar {
            width: 100%;
        }

        .bar_1 {
            background-color: white;
            border:2px solid black
        }
        .main_bar{
            background-color: grey;
        }
        .main2_bar{
            background-color: red;
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
        <?php foreach ($game['huds'] as $hud): ?>
            <div class="sec_1">
                <img src="<?php print $hud['weapon']; ?>.png" alt="weapon">
                <div class="progress_bar">
                    <span><?php print $hud['time']; ?></span>
                    <div class="bar_1">
                        <div class="main_bar" style="height:24px;width:<?php print $hud['bar_1']; ?>%"></div>
                    </div>
                </div>
            </div>
            <div class="bar_1">
                <div class="main2_bar" style="height:24px;width:<?php print $hud['bar_2']; ?>%"></div>
            </div>


        <?php endforeach; ?>
    </div>
</div>
</body>
</html>