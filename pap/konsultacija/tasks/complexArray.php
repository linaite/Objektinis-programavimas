<?php
/*
1. Sudarykite masyvą, kuriame būtų aprašyta Vilniaus:
  "mayor" meras, string
  "address" savivaldybės adresas, string
  "number" numeris, string
  "area" plotas kvadratiniais kilometrais, int
  "elderships" seniunijų masyvas [] - BENT 3 SENIŪNIJOS -->
​
2. Kiekviena seniunija turi turėti:
    title: pavadinimą, string
    elder: seniunas, string
 */

$vilnius = [
    "mayor" => 'Remigijus Šimašius',
    "number" => '+370 35 654 84',
    "area" => 401,
    "elderships" => [
        [
            "title" => "Antakalnio seniūnija",
            "address" => "Antakalnio g. 17, 10312 Vilnius",
            "elder" => "Taurintas Rudys",
            "population" => 18369
        ],
        [
            "title" => "Fabijoniškių Seniūnija",
            "address" => "S. Stanevičiaus g. 24, LT-07102 Vilnius",
            "elder" => "Jonas Novikevičius",
            "population" => 22369
        ],
        [
            "title" => "Grigiškių Seniūnija",
            "address" => "Vilniaus g. 6, LT-27101 Grigiškės, Vilniaus m. sav.",
            "elder" => "Leonard Klimovič",
            "population" => 51111
        ],
        [
            "title" => "Naujininkų Seniūnija",
            "address" => "Dariaus ir Girėno g. 11, LT-02170 Vilnius",
            "elder" => "Raimondas Lingys",
            "population" => 39001
        ],
        [
            "title" => "Senamiesčio seniūnija",
            "address" => "Odminių g. 3, LT-01122 Vilnius",
            "elder" => "Irena Paukštytė",
            "population" => 19423
        ],
    ]
]
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>Hud</title>
</head>
<body>
<!--3. Atspausdinkite visu seniuniju pavadinimus-->
<ul>
    <?php foreach ($vilnius['elderships'] as $eldership): ?>
        <li><?php print $eldership['title']; ?></li>
    <?php endforeach; ?>
</ul>
<hr/>
<!--4. Atspausdinkite vienos is seniuniju visus duomenis-->
<ul>
    <?php foreach ($vilnius['elderships'][2] as $property): ?>
        <li><?php print $property; ?></li>
    <?php endforeach; ?>
</ul>
<hr/>
<!-- 5. Atspausdinkite visų seniunijų duomenis lentele -->
<?php
function renderEldershipTable($elderships, $tableHeader)
{
?>
<h3><?= $tableHeader ?></h3>
<table width="100%" border="1">
    <thead>
    <tr>
        <th>Pavadinimas</th>
        <th>Adresas</th>
        <th>Vadovas</th>
        <th>Gyventoju skaicius</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($elderships as $eldership) : ?>
        <tr>
            <?php foreach ($eldership as $property) : ?>
                <td><?= $property ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
}

renderEldershipTable($vilnius['elderships'], 'Visos seniūnijos');
?>
<hr/>
<!-- 6. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra iki 20 tūkst. -->
<?php
function filterEldershipsByMinPopulation($elderships, $minPop)
{
    $newElderships = [];
    foreach ($elderships as $eldership)
        if ($eldership['population'] < $minPop)
            $newElderships[] = $eldership;
    return $newElderships;
}

$eldershipsWithPopulationLessThen20k = filterEldershipsByMinPopulation($vilnius['elderships'], 20000);
renderEldershipTable($eldershipsWithPopulationLessThen20k, 'Seniūnijos turinčios mažiau nei 200000 gyventojų');
?>
<hr/>
<!-- 7. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra virš 50 tūkst. -->
<?php
function filterEldershipByMaxPopulation($elderships, $maxPop)
{
    $newElderships = [];

    foreach ($elderships as $eldership) {
        if ($eldership['population'] > $maxPop) {
            $newElderships[] = $eldership;
        }
    }
    return $newElderships;
}

$eldershipsWithPopulationMoreThan50k = filterEldershipByMaxPopulation($vilnius['elderships'], 50000);
renderEldershipTable($eldershipsWithPopulationMoreThan50k, 'Seniūnijos turinčios daugiau nei 50 tūkst. gyventojų');

?>
<hr/>
<!-- 8. Atspausdinkite tik tų seniunijų duomenis
   kur gyventojų kiekis yra nuo 30 iki 40 tūktstančių -->
<?php

$eldershipsTo40K = filterEldershipsByMinPopulation($vilnius['elderships'], 40000);
$elderships30to50K = filterEldershipByMaxPopulation($eldershipsTo40K, 30000);

renderEldershipTable($elderships30to50K, 'Seniūnijos turinčios tarp 30 iki 40 tūkst. gyventojų');
?>
<hr/>
<!-- 9. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių -->
<ul>
    ​<?php foreach ($vilnius['elderships'] as $eldership): ?>
        <li><?= print $eldership['population']; ?></li>
    <?php endforeach; ?>
</ul>
<hr/>

<!-- 10. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių, išrikiavus mažėjimo tvarka -->
​<?php
$populations = [];

foreach ($vilnius['elderships'] as $eldership) {
    $populations[] = $eldership['population'];
}
rsort($populations);

foreach ($populations as $population): ?>
<div><?= $population ?></div>
<?php endforeach; ?>
<hr/>
<!-- 11. Susumuokite visų seniūnijų gyventojų skaičių -->
​<?php
$totalPopulation = 0;
foreach ($vilnius['elderships'] as $eldership) {
    $totalPopulation += $eldership['population'];
}
?>
<div><?= $totalPopulation ?></div>
​
<hr/>
<!-- 12. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje -->
​<?php
$avg = 0;
foreach ($vilnius['elderships'] as $eldership) {
    $avg += $eldership['population'] / count($vilnius['elderships']);
}

?>
<div><?= $avg ?></div>
​
<hr/>
<!-- 13. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje atmetus didžiausią ir mažiausią seniuniją -->
​<?php
$populations = [];

foreach ($vilnius['elderships'] as $eldership) {
    $populations[] = $eldership['population'];
}
rsort($populations);
$mainPopulations = array_slice($populations, 1, count($populations) - 2);
$avg = 0;
foreach ($mainPopulations as $population) {
    $avg += $population / count($mainPopulations);
}
?>
<div><?= $avg ?></div>

</body>
</html>



