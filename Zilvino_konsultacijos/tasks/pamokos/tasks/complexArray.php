<!-- 1. Sudarykite masyvą, kuriame būtų aprašyta Vilniaus:
  "mayor" => meras, string
  "number"  =>numeris, string
  "area"  => plotas kvadratiniais kilometrais, float
  "elderships" => seniunijų masyvas [] - BENT 3 SENIŪNIJOS -->

<!-- 2. Kiekviena seniunija turi turėti:
  title => pavadinimą, string
  addresas => seniūnijos adresas, string
  elder => seniunas, string
  population => gyventojų skaičių, number -->
<?php
$vilnius = [
  "mayor" => 'Remigijus Šimašius',
  "number"  => '+370 35 654 84',
  "area"  => 401,
  "elderships" => [
    [
      "title" => "Antakalnio seniūnija",
      "address" => "Antakalnio g. 17, 10312 Vilnius",
      "elder" => "Taurintas Rudys",
      "population" => 52369
    ],
    [
      "title" => "Fabijoniškių",
      "address" => "S. Stanevičiaus g. 24, LT-07102 Vilnius",
      "elder" => "Jonas Novikevičius",
      "population" => 22369
    ],
    [
      "title" => "Grigiškių",
      "address" => "Vilniaus g. 6, LT-27101 Grigiškės, Vilniaus m. sav.",
      "elder" => "Leonard Klimovič",
      "population" => 32111
    ],
    [
      "title" => "Naujininkų Seniūnija",
      "address" => "Dariaus ir Girėno g. 11, LT-02170 Vilnius",
      "elder" => "Raimondas Lingys",
      "population" => 37001
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

<!-- 3. Atspausdinkite visų seniūnijų pavadinimus -->
<?php foreach ($vilnius['elderships'] as $eldership) : ?>
  <div><?= $eldership['title'] ?></div>
<?php endforeach; ?>

<!-- 4. Atspaudinkite vienos iš seniunijų duomenis -->
<ul>
  <?php foreach ($vilnius['elderships'][2] as $property) : ?>
    <li><?php print $property; ?></li>
  <?php endforeach; ?>
</ul>
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
renderEldershipTable($eldershipsWithPopulationLessThen20k, 'Seniūnijos turinčios mažiau nei 20000 gyventojų');
?>

<!-- 7. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra virš 50 tūkst. -->
<?php
function filterEldershipsByMaxPopulation($elderships, $maxPop)
{
  $newElderships = [];
  foreach ($elderships as $eldership) {
    if ($eldership['population'] > $maxPop) {
      $newElderships[] = $eldership;
    }
  }
  return $newElderships;
}

$eldershipsWithPopulationMoreThan50k = filterEldershipsByMaxPopulation($vilnius['elderships'], 50000);
renderEldershipTable($eldershipsWithPopulationMoreThan50k, 'Seniūnijos turinčios daugiau nei 50 tūkst. gyventojų');
?>

<!-- 8. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra nuo 30 iki 40 tūktstančių -->
<?php
$eldershipsTo40k = filterEldershipsByMinPopulation($vilnius['elderships'], 40000);
$elderships30To40k = filterEldershipsByMaxPopulation($eldershipsTo40k, 30000);
renderEldershipTable($elderships30To40k, 'Bendrijos tarp 30k ir 40k');
?>

<!-- 9. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių -->
<?php foreach ($vilnius['elderships'] as $eldership) : ?>
  <div><?= $eldership['population'] ?></div>
<?php endforeach; ?>

<!-- 10. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių, išrikiavus mažėjimo tvarka -->
<?php
$allPopulations = [];
foreach ($vilnius['elderships'] as $eldership) {
  $allPopulations[] = $eldership['population'];
}
rsort($allPopulations);
foreach ($allPopulations as $population) : ?>
  <div><?= $population ?></div>
<?php endforeach; ?>
<!-- 11. Susumuokite visų seniūnijų gyventojų skaičių -->
<?php
$totalPopulation = 0;
foreach ($vilnius['elderships'] as $eldership) {
  $totalPopulation += $eldership['population'];
}
?>
<div><?= $totalPopulation ?></div>

<!-- 12. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje -->
<?php
$avg = 0;
foreach ($vilnius['elderships'] as $eldership) {
  $avg += $eldership['population'] / count($vilnius['elderships']);
}
?>
<div><?= $avg; ?></div>

<!-- 13. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje atmetus didžiausią ir mažiausią seniuniją -->
<?php
$allPopulations = [];
foreach ($vilnius['elderships'] as $eldership){
$allPopulations[] = $eldership['population'];
}
rsort($allPopulations);
$mainPopulations = array_slice($allPopulations, 1, count($allPopulations) - 2);
$avgExcept = 0;
foreach ($mainPopulations as $population) {
    $avgExcept += $population / count($mainPopulations);
}
?>
<div><?= $avgExcept?></div>