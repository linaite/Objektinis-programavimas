<?php
$game = [
    'objects' => [
        [
            'x' => 50,
            'y' => 500,
            'class' => 'car',
        ],
        [
            'x' => 100,
            'y' => 100,
            'class' => 'ball',
        ],
        [
            'x' => 1020,
            'y' => 200,
            'class' => 'house',
        ],
        [
            'x' => 700,
            'y' => 500,
            'class' => 'person',
        ],
    ]
];

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
    body {
        min-height: 100vh;
        background-image: url("https://einasau.lt/wp-content/uploads/2019/04/vietnam-sapa-countryside.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .car {
        background: url("https://cdn2.buyacar.co.uk/sites/buyacar/files/styles/w860/public/alfa-romeo-giulia67-1_0.jpg?itok=cM6fGydG");
        background-size: contain;
        background-repeat: no-repeat;
        width: 300px;
        height: 100px;
    }

    .ball {
        background: url("https://www.bcf.com.au/on/demandware.static/-/Sites-srg-internal-master-catalog/default/dw20bfd25f/images/520209/BCF_520209_hi-res.jpg");
        background-size: contain;
        background-repeat: no-repeat;
        width: 100px;
        height: 100px;
    }

    .house {
        background: url("https://lh3.googleusercontent.com/mk4C8GtfBo8UmmwrDtQb1essiQPh_A1cN8S5liJ3jCRy1RSqAMCYgP6VW-yH70XFDic");
        background-size: contain;
        background-repeat: no-repeat;
        width: 400px;
        height: 400px;
    }

    .person {
        background: url("https://toppng.com/uploads/preview/happy-person-11545688398rslqmyfw4g.png");
        background-size: contain;
        background-repeat: no-repeat;
        width: 200px;
        height: 400px;
    }

    .object {

        position: absolute
    }
</style>
<body>
<?php foreach ($game['objects'] as $object): ?>
    <div style="left:<?php print $object['x']; ?>px; top:<?php print $object['y']; ?>px;"
         class="<?php print $object['class']; ?> object"></div>
<?php endforeach; ?>
</body>
</html>






