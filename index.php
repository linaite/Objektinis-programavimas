<?php

$game = [
    'objects' => [
        [
            'x' => 300,
            'y' => 400,
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
}

var_dump($game);

























