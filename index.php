<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bg-1 {
            background-color: red;
        }

        .bg-2 {
            background-color: green;
        }

        .bg-3 {
            background-color: blue;
        }

        .bg-4 {
            background-color: purple;
        }

        .bg-5 {
            background-color: orange;
        }
    </style>
</head>
<body>
<button class="bg-<?php print (rand(1, 5)); ?>">BTN1</button>
<button class="bg-<?php print (rand(1, 5)); ?>">BTN2</button>
<button class="bg-<?php print (rand(1, 5)); ?>">BTN3</button>
<button class="bg-<?php print (rand(1, 5)); ?>">BTN4</button>
<button class="bg-<?php print (rand(1, 5)); ?>">BTN5</button>
</body>
</html>