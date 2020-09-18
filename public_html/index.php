<?php
require('../bootloader.php');

//$message = is_logged_in() ? "Sveikas prisijungęs, {$_SESSION['username']}!" : 'Tokio vartotojo nera';

$pixels_db = new FileDB(DB_FILE);
$pixels_db->load();

$pixels = $pixels_db->getRowsWhere('pixels', []);


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
    <style>
        .container {
            width: 500px;
            height: 500px;
            margin: 80px auto;
            position: relative;
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF9ree1CFBNb-IpvYHCMP5Ov6Uzp6lDJ1txQ&usqp=CAU");
            box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
        }

        .pixel {
            display: inline-block;
            position: absolute;
            width: 10px;
            height: 10px
        }
    </style>
</head>
<body>
<header>
    <?php include(ROOT . '/app/templates/nav.php'); ?>
</header>
<main>
    <?php if (isset($message)) : ?>
        <span><?php print $message; ?></span>
    <?php endif; ?>
    <div class="container">
        <?php foreach ($pixels as $pixel): ?>
            <span class="pixel"
                  style="background-color:<?= $pixel['color']; ?>;
                          top:<?php print $pixel['x']; ?>px;
                          left:<?php print $pixel['y']; ?>px">
            </span>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>