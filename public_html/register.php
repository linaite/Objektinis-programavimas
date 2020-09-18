<?php
require('../bootloader.php');

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'username' => [
            'label' => 'username',
            'validators' => [
                'validate_field_not_empty',
                'validate_user_unique',
            ],
            'type' => 'text',
//            'value' => 'Email',
            'extra' => [
                'attr' => [
                    'class' => 'text',
                    'placeholder' => 'Username...'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'validators' => [
                'validate_field_not_empty',
//                'validate_field_is_number',
//                'validate_field_range' => [
//                    'min' => 100,
//                    'max' => 200,
//                ]
            ],
            'type' => 'password',
//            'value' => 'Email',
            'extra' => [
                'attr' => [
                    'class' => 'name',
                    'placeholder' => 'Password...'
                ]
            ]
        ],

        'repeat_password' => [
            'label' => 'Please repeat paassword',
            'validators' => [
                'validate_field_not_empty',
//                'validate_field_is_number',
//                'validate_field_range' => [
//                    'min' => 50,
//                    'max' => 100,
//                ]
            ],
            'type' => 'password',
//            'value' => 'Paswword',
            'extra' => [
                'attr' => [
                    'class' => 'age',
                    'placeholder' => 'Slaptažodis'
                ]
            ]
        ]

//        'sex' => [
//            'label' => 'Lytis',
//            'validators' => [
//                '',
//            ],
//            'type' => 'select',
//            'value' => 'female',
//            'options' => [
//                'male' => 'Kardanas',
//                'female' => 'Mova',
//            ],
//        ],
    ],

    'buttons' => [
        'save' => [
            'title' => 'Register',
            'extra' => [
                'attr' => [
                    'class' => 'big-button',
                ]
            ]
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'repeat_password',
        ],
    ]
];


//function form_success($input, $form)
//{
//
//    $database = file_to_array(DB_FILE);
//
//    $database[] = $input;
//
//    return array_to_file($database, DB_FILE);
//}


if (!empty($_POST)) {
    $form_values = sanitize_form_input_values($form);
    if (validate_form($form, $form_values)) {
        unset($form_values['repeat_password']);

        $users_db = new FileDB(DB_FILE);
        $users_db->load();

        $users_db->insertRow('users', $form_values);

        $message = $users_db->save() ? 'Issaugota' : 'Neisaugota';

//        $message = form_success($form_values, DB_FILE) ? 'Išsaugota' : 'Neišsaugota';
        header('Location: login.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
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