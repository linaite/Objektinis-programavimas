<?php
define('ITEM_LOST', 0);
define('ITEM_IN_USE', 1);
define('ITEM_EMPTY', 2);
$players = [
    [
        'name' => [
            'Petras',
            'Pizdys'
        ],
        'items' => [
            [
                'name' => 'Telefonas',
                'status' => ITEM_LOST
            ]
        ]
    ],
    [
        'name' => [
            'Tomas',
            'Ablomas'
        ],
        'items' => [
            [
                'name' => 'Buljonas',
                'status' => ITEM_IN_USE
            ]
        ]
    ],
    [
        'name' => [
            'Ana',
            'Shitkova'
        ],
        'items' => [
            [
                'name' => 'Rulonas',
                'status' => ITEM_EMPTY
            ]
        ]
    ]
];
var_dump($players);