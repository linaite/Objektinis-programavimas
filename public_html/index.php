<?php
require('../bootloader.php');

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'name' => [
//            'filter' => FILTER_SANITIZE_EMAIL,
            'label' => 'Įveskite skaičių (100-200)',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_num_from100to200',
            ],
            'type' => 'number',
//            'value' => 'Email',
            'extra' => [
                'attr' => [
                    'class' => 'name',
//                    'placeholder' => 'vardas ir pavarde'
                ]
            ]
        ],
        'age' => [
            'label' => 'Įveskite skaičių (50-100)',
            'validators' => [
                'validate_field_is_number',
                'validate_field_is_num_from50to100',
            ],
            'type' => 'number',
//            'value' => 'Paswword',
            'extra' => [
                'attr' => [
                    'class' => 'age',
//                    'placeholder' => 'Amžius'
                ]
            ],
        ],
    ],
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
//    ],
    'buttons' => [
        'save' => [
            'title' => 'Ar skiriu skaičius?',
            'extra' => [
                'attr' => [
                    'class' => 'big-button'
                ]
            ]
        ]
    ]
];


if (!empty($_POST)) {
$form_values = sanitize_form_input_values($form);
$success = validate_form($form, $form_values);

if ($success) : ?>
<p><?php print 'Išvada: skirti'; ?>
    <?php else : ?>
<p><?php print 'Išvada: daktaras iškviestas'; ?>
    <?php endif;
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
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
    <main>
        <?php include('../core/templates/form.tpl.php'); ?>

        <!--    <p>--><?php //print $input['email'] ?? 'Neivesta'; ?><!--</p>-->
        <!--    <p>--><?php //print $input['password'] ?? 'Neivesta'; ?><!--</p>-->
        <!--    <p>--><?php //print $input['sex'] ?? 'Neivesta'; ?><!--</p>-->
    </main>

    </body>
    </html>