<?php

require('../bootloader.php');

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'x' => [
            'validators' => [
                'validate_field_not_empty',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 490,
                ],
            ],
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'class' => 'text',
                    'placeholder' => 'X kordinate'
                ]
            ]
        ],
        'y' => [
            'validators' => [
                'validate_field_not_empty',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 490,
                ],
            ],
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'class' => 'text',
                    'placeholder' => 'Y kordinate'
                ]
            ]
        ],
        'color' => [
            'type' => 'select',
            'value' => 'red',
            'options' => [
                'red' => 'Red',
                'black' => 'Black',
                'green' => 'Green',
                'blue' => 'Blue',
            ],
            'validators' => [
                'validate_field_select',
            ],
        ],
    ],
    'buttons' => [
        'save' => [
            'title' => 'Įdėti pikselį',
            'extra' => [
                'attr' => [
                    'class' => 'btn',
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_pixels_unique',
    ]
];


if (!empty($_POST)) {
    $form_values = sanitize_form_input_values($form);
    if (validate_form($form, $form_values)) {
        $pixels_db = new FileDB(DB_FILE);
        $pixels_db->load();
        $pixels_db->insertRow('pixels', ['username' => $_SESSION['username'], 'x' => $form_values['x'], 'y' => $form_values['y'], 'color' => $form_values['color']]);
        $pixels_db->save();
        header('Location: my.php');
        exit;
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style-project.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
    <?php include('../app/templates/nav.php'); ?>
</header>
<main>
    <?php include('../core/templates/form.tpl.php'); ?>
</main>
</body>
</html>
