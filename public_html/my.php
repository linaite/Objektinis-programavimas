<?php
require('../bootloader.php');

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$pixels_db = new FileDB(DB_FILE);
$pixels_db->load();
$pixels = $pixels_db->getRowsWhere('pixels', ['username' => $_SESSION['username']]);

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
</head>
<style>
    .container {
        width: 500px;
        height: 500px;
        margin: 80px auto;
        position: relative;
        background-image: url("https://media.gettyimages.com/photos/white-brick-wall-background-picture-id907892712?b=1&k=6&m=907892712&s=612x612&w=0&h=VgAVNQRdjzZ9Pq3BoTg_2vHbGFwvJokRqcAkB1Q8DyM=");
        box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
    }

    .pixel {
        display: inline-block;
        position: absolute;
        width: 10px;
        height: 10px
    }
</style>
<body>
<header>
    <?php include('../app/templates/nav.php'); ?>
</header>
<main>
    <div class="container">
        <?php foreach ($pixels as $pixel): ?>
            <span class="pixel"
                  style="background-color:<?= $pixel['color']; ?>;
                          top:<?php print $pixel['x']; ?>px;
                          left:<?php print $pixel['y']; ?>px"
            ></span>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>