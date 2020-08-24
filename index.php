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

    //  var_dump($game);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aiste is awesome</title>
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
            content: url("https://images.unsplash.com/photo-1543005472-1b1d37fa4eae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80");
        }
        .target {
            content: url("https://upload.wikimedia.org/wikipedia/commons/c/c5/Target_Corporation_logo_%28vector%29.svg");
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
</div>
</body>
</html>