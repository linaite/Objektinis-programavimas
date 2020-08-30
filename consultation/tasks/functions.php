<!------------------------Funkcijos-------------------------- -->
<!--1. Sukurti funkciją, kuri ima masyvą ir atspausdina kiek- -->
<!--vieną jo reikšmę atskirai: [0] => 64.  (nieko negrąžina) -->
<?php
$numbers = [1, -2, 3, 4, 17, 6, 103, 8, -9, 10];
/**
 * Spausdina masyvo skaicius stulpeliu
 *
 * @param array $array primityviu reiksmiu masyvas
 */
function printNumbers($array)
{
    foreach ($array as $number) :?>
        <div><?php print $number; ?></div>
    <?php endforeach;
}

printNumbers($numbers);
?>
<hr/>
<!--1. Sukurti funkciją, kuri atspausdina kiekviena reiksme eilute atskyrus kableliu-->
<?php function printRow($array)
{
    ?>
    <div>[ <?php print join(', ', $array); ?> ]</div>
    <?php
}

printRow($numbers);
?>
<hr/>

<!--2. Sukurti funkciją, kuri ima masyvą ir grąžina visų jo elementų sumą -->
<?php function arrSum($array)
{
    $totalSum = 0;
    foreach ($array as $value) {
        $totalSum += $value;
    }
    return $totalSum;
}

?>
<div>Narių suma: <?php print arrSum($numbers); ?> </div>
<hr/>
<!--3. Sukurti funkciją, kuri ima masyvą ir grąžina visų ele- -->
<!--mentų vidurkį -->
<?php

function avg($array)
{
    $total = 0;
    foreach ($array as $number) {
        $total += $number / count($array);
    }
    return $total;
}

?>
<div>Vidurkis: <?php print avg($numbers); ?></div>
<hr/>
<!--4. Sukurti funkciją, kuri ima masyvą ir grąžina didžiausią skaičių masyve. -->
<?php function maxValue($array)
{
    $max = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] > $max) {
            $max = $array[$i];
        }
    }
    return $max;
}

?>
<div>Max value: <?php print maxValue($numbers); ?></div>
<hr/>
<!--5. Sukurti funkciją, kuri ima masyvą ir grąžina mažiausią skaičių masyve. -->
<?php function minValue($array)
{
    $min = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $min) {
            $min = $array[$i];
        }
    }
    return $min;
}

?>
<div>Min value: <?php print minValue($numbers); ?></div>
<hr/>
<!--6. Sukurti funkciją, kuri ima masyvą ir išrikiuja jo elementus nuo mažiausio iki didžiausio ir grąžina tą masyvą. -->
<?php function sortFromMinToMax($array)
{
    sort($array);
    return $array;
}

$numbersSorted = sortFromMinToMax($numbers);
?>
<div><?php print printRow($numbersSorted); ?></div>
<hr/>
<!--
    7. Sukurti asociatyvų mašinų masyvą, su savybėmis
  'brand', 'model', 'year', 'price',
 -->

<?php
$cars = [
    [
        'brand' => 'BMW',
        'model' => 'X5',
        'year' => 2015,
        'price' => 30000
    ],
    [
        'brand' => 'Audi',
        'model' => 'A6',
        'year' => 2018,
        'price' => 45000
    ],
    [
        'brand' => 'Škoda',
        'model' => 'Superb',
        'year' => 2011,
        'price' => 25000,
    ],
    [
        'brand' => 'Honda',
        'model' => 'Jazz',
        'year' => 2005,
        'price' => 5000,
    ],
    [
        'brand' => 'Toyota',
        'model' => 'Auris',
        'year' => 2009,
        'price' => 4000,
    ],
    [
        'brand' => 'Lexus',
        'model' => 'X1',
        'year' => 2020,
        'price' => 50000,
    ],
];
?>
<!--   8. Sukurti funkciją kuri spausdina visas mašinas. -->

<?php
function printCarsTable($carArr, $title)
{
    ?>
    <div class="cars-table">
        <div class="p-1 cars-table__title"><?= $title ?></div>
        <div class="row cars-table__header">
            <div class="col p-1">Markė</div>
            <div class="col p-1">Modelis</div>
            <div class="col p-1">Metai</div>
            <div class="col p-1">Kaina</div>
        </div>
        <div class="cars-table__body">
            <?php foreach ($carArr as $car) : ?>
                <div class="row">
                    <div class="col p-1"><?= $car['brand'] ?></div>
                    <div class="col p-1"><?= $car['model'] ?></div>
                    <div class="col p-1"><?= $car['year'] ?></div>
                    <div class="col p-1"><?= $car['price'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

printCarsTable($cars, 'Visos mašinos');
?>
<hr/>

<!--9. Sukurti funkciją kuri atrenka visas tik tam tikros markės mašinas.
Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
-->
<?php
function filterCarsByBrand($cars, $brand)
{
    $carsByBrand = [];
    foreach ($cars as $car) {
        if ($car['brand'] === $brand)
            $carsByBrand[] = $car;
    }
    return $carsByBrand;
}

$carsAudi = filterCarsByBrand($cars, 'Audi');
$carsBMW = filterCarsByBrand($cars, 'BMW');
?>
<?php printCarsTable($carsAudi, 'Audi') ?>
<!--
    10. Sukurti funkciją kuri atrenka mašinas brangesnes, nei parametru paduodama reikšmė.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function filterCarsPriceFrom($cars, $price)
{
    $filteredCars = [];
    foreach ($cars as $car) {
        if ($car['price'] >= $price)
            $filteredCars[] = $car;
    }
    return $filteredCars;
}

$carsFromPrice2000 = filterCarsPriceFrom($cars, 20000);

printCarsTable($carsFromPrice2000, 'Brangesnės nei 20000 eur') ?>

<!--
    11. Sukurti funkciją kuri atrenka mašinas pigesnes, nei parametru paduodama reikšmė.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function filterCarsPriceUpTo($cars, $price)
{
    $filteredCars = [];
    foreach ($cars as $car) {
        if ($car['price'] <= $price)
            $filteredCars[] = $car;
    }
    return $filteredCars;
}

$priceUpTo2000 = filterCarsPriceUpTo($cars, 20000);

printCarsTable($priceUpTo2000, 'Pigesnesnės nei 20000 eur') ?>
<!--
    12. Sukurti funkciją kuri išrikiuoja mašinas pagal kainą.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php

function byPrice($current, $next)
{
    return $current['price'] - $next['price'];
}

function sortByPrice($cars)
{
    usort($cars, 'byPrice');
    return $cars;
}

$carsSortedByPrice = sortByPrice($cars);

printCarsTable($carsSortedByPrice, 'Išrikiuota pagal kainą') ?>

<!--
    13. Sukurti funkciją kuri išrikiuoja mašinas pagal parametru paduotą funkciją.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function byYearASC($current, $next)
{
    return $current['year'] - $next['year'];
}

function byYearDESC($current, $next)
{
    return $next['year'] - $current['year'];
}

function sortCars($cars, $cmpFunction)
{
    usort($cars, $cmpFunction);
    return $cars;
}

$carsSortedByYearASC = sortCars($cars, 'byYearASC');
$carsSortedByYearDESC = sortCars($cars, 'byYearDESC');

printCarsTable($carsSortedByYearASC, 'Išrikiuota pagal metus didėjimo tvarka');
printCarsTable($carsSortedByYearDESC, 'Išrikiuota pagal metus mažėjimo tvarka')
?>

<!-- 14. Atrinkti BMW automobilius brangesnius nei 30 000 ir iškikiuokite pagal kainą mažėjančia tvarka-->


<!--15. Atrinkti Toyota automobilius pigesnius nei 10 000 ir iškikiuokite pagal markę tvarka-->

<!--16. Atrinkti Audi automobilius naujesnius nei 2010 metai, rėžiuose [10000; 50000], išrikiuoti pagal metus didėjančia tvarka-->

<!--17. Parašyti funkciją kuri palygina du mašinų masyvus, pagal suminę mašinų kainą
      grąžinti true - jei pirmojo masyvo kainų suma didenė už antrojo,
      grąžinti false - mei antrojo masyvo kainų suma NEdidenė už antrojo
      Atspausdinti ekrane "Pirmojo masyvo mašinų kainų suma yra didesnė"
        arba  "Antrojo masyvo mašinų kainų suma NĖRA didesnė"
 -->

<!--18. Parašyti funkciją kuri palygina du mašinų masyvus, pagal vidutinę mašinų kainą
      grąžinti true - jei pirmojo masyvo kainų vidurkis didesnis už antrojo,
      grąžinti false - jei masyvo kainų vidurkis NĖRA didenis už antrojo
      Atspausdinti ekrane "Pirmojo masyvo mašinų kainų vidurkis yra didesnis"
        arba "Pirmojo masyvo mašinų kainų vidurkis NĖRA didesnis"
-->
