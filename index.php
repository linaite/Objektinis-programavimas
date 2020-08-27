<?php
require('functions/html.php');

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'email' => [
            'label' => 'e-mail',
            'type' => 'email',
            'value' => 'my-mail',
            'extra' => [
                'attr' => [
                    'class' => 'email-field',
                    'placeholder' => 'jonas@jonaitis.lt'
                ]
            ]
        ]
    ],
    'buttons' => [
        'save' => [
            'title' => 'Join',
            'extra' => [
                'attr' => [
                    'class' => 'big-button'
                ]
            ]
        ]
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
<body>
<main>
    <?php include('templates/form.tpl.php'); ?>
</main>
</body>
</html>