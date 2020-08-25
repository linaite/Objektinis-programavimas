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
            "title" => "Fabijoniškių Seniūnija",
            "address" => "S. Stanevičiaus g. 24, LT-07102 Vilnius",
            "elder" => "Jonas Novikevičius",
            "population" => 22369
        ],
        [
            "title" => "Grigiškių Seniūnija",
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
<?php foreach ($vilnius['elderships'] as $eldership): ?>
    <ul>
        <li><?php print $eldership['title']; ?></li>
    </ul>
<?php endforeach; ?>
<hr/>
<!--4. Atspausdinkite vienos is seniuniju visus duomenis-->
<ul>
    <?php foreach ($vilnius['elderships'][1] as $property): ?>
        <li><?php print $property; ?></li>
    <?php endforeach; ?>
</ul>
<hr/>
<!-- 5. Atspausdinkite visų seniunijų duomenis lentele -->
​
<!-- 6. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra iki 20 tūkst. -->
​
<!-- 7. Atspausdinkite tik tų seniunijų duomenis kur gyventojų kiekis yra virš 50 tūkst. -->
​
<!-- 8. Atspausdinkite tik tų seniunijų duomenis
   kur gyventojų kiekis yra nuo 30 iki 40 tūktstančių -->
​
<!-- 9. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių -->
​
<!-- 10. Stulpeliu atspausdinkite kiekvienos seniūnijos gyventojų skaičių, išrikiavus mažėjimo tvarka -->
​
<!-- 11. Susumuokite visų seniūnijos gyventojų skaičių -->
​
<!-- 12. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje -->
​
<!-- 13. Suskaičiuokite vidutinį gyventojų skaičių vienoje seniūnijoje atmetus didžiausią ir mažiausią seniuniją -->

</body>
</html>



