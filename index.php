<?php
var_dump($_POST);
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['age']) && isset($_POST['field']) && isset($_POST['gun'])) {
    $name = 'Vardas: ' . $_POST['name'];
    $surname = 'Pavardė: ' . $_POST['surname'];
    $age = 'Amžius: ' . $_POST['age'];
    $field = 'Sritis: ' . $_POST['field'];
    $gun = 'Mėgstamiausias ginklas: ' . $_POST['gun'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php if (empty($_POST)) : ?>
    <form method="post">
        <h2 class="form__title">Priėmimo į Baltarusijos mentus anketa</h2>
        <div class="input-group">
            <label for="name">Vardas</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-group">
            <label for="surname">Pavardė</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="input-group">
            <label for="age">Amžius</label>
            <input type="number" id="age" name="age">
        </div>
        <div class="input-group">
            <label for="cars">Sritis</label>
            <select name="field" id="field">
                <option selected hidden>Pradedantysis</option>
                <option name="omon">OMON</option>
                <option name="policija">Policija</option>
                <option name="profas">Profesionalas</option>
            </select>
        </div>
        <div>
            <span>Koks tavo mėgstamiausias ginklas?</span>
            <div>
                <input type="radio" id="peilis" name="gun" value="Kumštis">
                <label for="peilis">Peilis</label><br>
                <input type="radio" id="bananas" name="gun" value="Bananas">
                <label for="bananas">Bananas</label><br>
                <input type="radio" id="kumštis" name="gun" value="Kumštis">
                <label for="kumštis">Kumštis</label><br>
            </div>
        </div>
        <div class="checkboxes">
            <input type="checkbox" name="checkArr[]" value="Šaunuolis, stipruolis!">
            <label for="question1">Ar daužytum žmones, jei reikėtų?</label><br>
            <input type="checkbox" name="checkArr[]" value="Lukašenka myli ir Tave">
            <label for="question1">Ar myli Lukašenką, labiau nei save?</label><br>
            <input type="checkbox" name="checkArr[]" value="Tu labai protingas!">
            <label for="question1">Ar tu durnas?</label><br><br>
        </div>
        <button>Registruotis</button>
    </form>
<?php else: ?>
    <div class="certificate">
        <div class="top">
            <h1>Sertifikatas</h1>
            <img src="https://cdn.countryflags.com/thumbs/belarus/flag-heart-3d-250.png" alt="flag">
        </div>
        <ul>
            <?php if (isset($name)) : ?>
                <li><?php print $name; ?> </li>
            <?php endif; ?>
            <?php if (isset($surname)) : ?>
                <li><?php print $surname; ?> </li>
            <?php endif; ?>
            <?php if (isset($age)) : ?>
                <li><?php print $age; ?> </li>
            <?php endif; ?>
            <?php if (isset($field)) : ?>
                <li><?php print $field; ?> </li>
            <?php endif; ?>
            <?php if (isset($gun)) : ?>
                <li><?php print $gun; ?> </li>
            <?php endif; ?>
            <?php if (isset ($_POST['checkArr'])): ?>
                <?php if (!empty($_POST['checkArr'])) : ?>
                    <?php foreach ($_POST['checkArr'] as $checked) : ?>
                        <li><?php print 'Apie tave: ' . $checked; ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
</body>
</html>