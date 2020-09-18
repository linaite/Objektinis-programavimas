<?php
require('../bootloader.php');

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'username' => [
            'label' => 'Username',
            'validators' => [
                'validate_field_not_empty',
            ],
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'class' => 'username',
                    'placeholder' => 'Username...'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'validators' => [
                'validate_field_not_empty',
            ],
            'type' => 'password',
            'extra' => [
                'attr' => [
                    'class' => 'password',
                    'placeholder' => 'Password...'
                ]
            ]
        ],
    ],
    'buttons' => [
        'save' => [
            'title' => 'Login',
            'extra' => [
                'attr' => [
                    'class' => 'big-button',
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_login',
    ]
];

if (!empty($_POST)) {
    $form_values = sanitize_form_input_values($form);
    if (validate_form($form, $form_values)) {
        header('Location: index.php');
        exit;
    } else {
        $message = 'Prisijungti nepavyko!';
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
    <link rel="stylesheet" href="assets/style-project.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <?php include('../app/templates/nav.php'); ?>
</header>
<main>
    <?php include('../core/templates/form.tpl.php'); ?>

    <?php if (isset($message)) : ?>
        <span><?php print $message; ?></span>
    <?php endif; ?>

</main>

</body>
</html>


