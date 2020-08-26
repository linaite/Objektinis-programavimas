<?php
var_dump($_POST);

$size = intval($_POST['size'] ?? 50);
$message = empty($_POST) ? 'Paspausk mygtuką' : $size;

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
<style>
    .boobs {
        background-image: url("https://cdn.pixabay.com/photo/2017/09/05/18/31/boobs-2718689_640.png");
        background-size: contain;
        background-repeat: no-repeat;
        width: <?php print $size; ?>px;
        height: <?php print $size; ?>px;
        margin: 160px 0 0 160px;
    }
</style>
<body>
<form method="post">
    <input type="range" min="1" max="100" value="<?php print $size; ?>" name="size">
    <button>Let's do it!</button>
</form>
<p><?= $message; ?></p>
<div class="boobs"></div>
</body>
</html>