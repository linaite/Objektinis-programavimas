<?php
$game = [
    'objects' => [
        [
            'x' => 50,
            'y' => 500,
            'class' => 'car',
            'on_fire' => true,
        ],
        [
            'x' => 100,
            'y' => 100,
            'class' => 'ball',
            'on_fire' => true,
        ],
        [
            'x' => 1020,
            'y' => 200,
            'class' => 'house',
            'on_fire' => true,
        ],
        [
            'x' => 700,
            'y' => 500,
            'class' => 'person',
            'on_fire' => true,
        ],
    ]
];

foreach ($game['objects'] as $key => $object) {
    $object['on_fire'] = rand(true, false);
    settype($object['on_fire'], "boolean");
    $game['objects'][$key] = $object;

    if ($object['on_fire'] === false) {
        $object['is_target'] = true;
        $game['objects'][$key] = $object;
    } else {
        $object['is_target'] = false;
        $game['objects'][$key] = $object;
    }
}
?>

<!doctype html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        min-height: 100vh;
        background-image: url("https://einasau.lt/wp-content/uploads/2019/04/vietnam-sapa-countryside.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .car {
        background: url("https://cdn2.buyacar.co.uk/sites/buyacar/files/styles/w860/public/alfa-romeo-giulia67-1_0.jpg?itok=cM6fGydG");
        height: 100px;
        width: 400px;
    }

    .ball {
        background: url("https://www.bcf.com.au/on/demandware.static/-/Sites-srg-internal-master-catalog/default/dw20bfd25f/images/520209/BCF_520209_hi-res.jpg");
        width: 100px;
        height: 100px;
    }

    .house {
        background: url("https://lh3.googleusercontent.com/mk4C8GtfBo8UmmwrDtQb1essiQPh_A1cN8S5liJ3jCRy1RSqAMCYgP6VW-yH70XFDic");
        width: 400px;
        height: 400px;
    }

    .person {
        background: url("https://toppng.com/uploads/preview/happy-person-11545688398rslqmyfw4g.png");
        width: 200px;
        height: 400px;
    }

    .object {
        position: absolute;
        background-size: contain;
        background-repeat: no-repeat;
    }

    .on-fire {
        background: url("https://images.unsplash.com/photo-1517594422361-5eeb8ae275a9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80");
        background-size: contain;
        background-repeat: no-repeat;
        width: 200px;
        height: 200px;
    }

    .is-target{
        background-image: url("https://images-na.ssl-images-amazon.com/images/I/413Wxa2ALML.png");
        background-repeat: no-repeat;
        background-size: cover;
        height:70px;
        width:70px;
    }
</style>
<body>
<?php foreach ($game['objects'] as $object): ?>
    <?php if ($object['on_fire'] === true): ?>
        <div style="left:<?php print $object['x']; ?>px; top:<?php print $object['y']; ?>px;"
             class="object on-fire <?php print $object['class']; ?>"></div>
    <?php else : ?>
        <div style="left:<?php print $object['x']; ?>px; top:<?php print $object['y']; ?>px;"
             class="object <?php print $object['class']; ?>"></div>
    <?php endif; ?>
<?php endforeach; ?>

<?php foreach ($game['objects'] as $object): ?>
    <?php if ($object['is_target'] === true): ?>
        <div style=" left:<?php print $object['x']; ?>px; top:<?php print $object['y'] - 100; ?>px;" class="object is-target"></div>
    <?php endif; ?>
<?php endforeach; ?>
</body>
</html>