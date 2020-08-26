<?php
/**
 * Squares the number
 * @param int $x number
 * @return int squared number
 */
function square(int $x) : int
{
    return $x ** 2;
}
var_dump($_POST);

if (isset($_POST['nr']) && is_numeric($_POST['nr'])) {
    $atsakymas = 'Atsakymas: ' . square($_POST['nr']);
} else {
    $atsakymas = 'Įrašykite skaičių';
}
?>
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
​
<body>
<form method="POST">
    Ką pakelti kvadratu: <input name="nr" type="number">
    <button name="submit">Submit</button>
</form>
<h2><?= $atsakymas; ?></h2>
</body>
​
</html>