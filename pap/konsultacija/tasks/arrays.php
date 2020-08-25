<!-- ----------------------Masyvai-------------------------- -->
<!--1. Persirašykite masyvą sudarytą iš skaičių -->
<?php
define('INIT_ARRAY', [16.7, 7, 2, 8, 4, 5, 7, 16, -5, -6, 7, 15.22, 1.66, -69.55, 1, 1, 5, 7, 5, 68.55]);
?>
<!--2. Sekančias užduotis atlikti su naujomis masyvo kopijomis.  -->
<!--Užduotys turi būti iškviečiamuose funkcijose -->
<!--3. Padauginti esamo masyvo narius iš 2 -->
<?php
$arrayDouble = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  $arrayDouble[] = INIT_ARRAY[$i] * 2;
}
var_dump($arrayDouble);
?>
<!--4. Pakelti masyvo narius kvadratu -->
<?php
$arrayPower = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  $arrayPower[] = INIT_ARRAY[$i] ** 2;
}
var_dump($arrayPower);
?>
<!--5. Padauginti masyvo narius iš jų index'o (vietos masyve) -->
<?php
$arrayMultipliedByIndex  = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  $arrayMultipliedByIndex[] = INIT_ARRAY[$i] * $i;
}
var_dump($arrayMultipliedByIndex);
?>
<!--6. Atrinkti tiktai teigimų elementų masyvą -->
<?php
$arrayPositive = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (INIT_ARRAY[$i] > 0) {
    $arrayPositive[] = INIT_ARRAY[$i];
  }
}
var_dump($arrayPositive);
?>
<!--7. Atrinkti tiktai neigiamų elementų masyvą -->
<?php
$arrayNegative = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (INIT_ARRAY[$i] < 0) {
    $arrayNegative[] = INIT_ARRAY[$i];
  }
}
var_dump($arrayNegative);
?>
<!--8. Atrinkti tiktai lyginių skaičių masyvą -->
<?php
$arrayEven = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (gettype(INIT_ARRAY[$i]) === "integer" && INIT_ARRAY[$i] % 2 === 0) {
    $arrayEven[] = INIT_ARRAY[$i];
  }
}
var_dump($arrayEven);
?>
<!--9. Atrinkti tiktai nelyginių skaičių masyvą -->
<?php
$arrayOdd = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (gettype(INIT_ARRAY[$i]) === "integer" && INIT_ARRAY[$i] % 2 === 1) {
    $arrayOdd[] = INIT_ARRAY[$i];
  }
}
var_dump($arrayOdd);
?>
<!--11. Visas neigiamas vertes masyve padaryti teigiamomis -->
<?php
$arrayAllPositive = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (INIT_ARRAY[$i] < 0) {
    $arrayAllPositive[] = INIT_ARRAY[$i] * -1;
  } else {
    $arrayAllPositive[] = INIT_ARRAY[$i];
  }
  // $arrayAllPositive[] = INIT_ARRAY[$i] * (INIT_ARRAY[$i] < 0 ? -1 : 1);
  // $arrayAllPositive[] = abs(INIT_ARRAY[$i]);
}
var_dump($arrayAllPositive);
?>
<!--12. Pakelti visas masyvo reikšmes laipsniu 'index' -->
<?php
$arrayPowerIndex  = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  $arrayPowerIndex[] = INIT_ARRAY[$i] ** $i;
}
var_dump($arrayPowerIndex);
?>
<!--13. Atrinkti tik natūralių skaičių masyvą -->
<?php
$arrayNatural  = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if (gettype(INIT_ARRAY[$i]) === "integer" && INIT_ARRAY[$i] > 0) {
    $arrayNatural[] = INIT_ARRAY[$i];
  }
}
var_dump($arrayNatural);
?>
<!--14. Suapvalinti visas masyvo reikšmes iki sveikų skaičių -->
<?php
$arrayIntegers  = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {

  $arrayIntegers[] = intval(round(INIT_ARRAY[$i]));
}
var_dump($arrayIntegers);
?>
<!--15. Atrinkti kas antrą elementą -->
<?php
$arrayEverySecond = [];
for ($i = 0; $i < count(INIT_ARRAY); $i += 2) {
  $arrayEverySecond[] = INIT_ARRAY[$i];
}
var_dump($arrayEverySecond);
?>
<!--16. Atrinkti kas penktą elementą -->

<?php
$arrayEverySecond = [];
for ($i = 0; $i < count(INIT_ARRAY); $i++) {
  if ($i % 5 === 0)
    $arrayEverySecond[] = INIT_ARRAY[$i];
}
var_dump($arrayEverySecond);
?>
<!------------------------Funkcijos-------------------------- -->
<!--17. Sukurti funkciją, kuri ima masyvą ir atspausdina kiek- -->
<!--vieną jo reikšmę atskirai: [0] => 64.  (nieko negrąžina) -->
<!--18. Sukurti funkciją, kuri ima masyvą ir grąžina visų -->
<!--jo elementų sumą -->
<!--19. Sukurti funkciją, kuri ima masyvą ir grąžina visų ele- -->
<!--mentų vidurkį -->
<!--20. Sukurti funkciją, kuri ima masyvą ir grąžina didžiau- -->
<!--sią skaičių masyve. -->
<!--21. Sukurti funkciją, kuri ima masyvą ir grąžina mažiau- -->
<!--sią skaičių masyve. -->
<!--22. Sukurti funkciją, kuri ima masyvą ir išrikiuja jo ele- -->
<!--mentus nuo mažiausio iki didžiausio ir grąžina tą masyvą. -->
<!------------------------Kūrybinės užduotys----------------- -->
<!--1. Sukurti Fibonacci seką(tai tokia seka, kuomet -->
<!--sekantis skaičius yra sudedamas su prieš tai 2 -->
<!--einančių načių sumos. Pirmieji nariai 0 ir 1. -->
<!--2. Parašykite funkciją, kuri mestų kauliuką iki kol iškris 5 arba 6. Visus -->
<!--  savo metimus išvestu i ekrana. (||, while) -->
<!--  Metame 2 kauliukus (arba vieną kauliuką 2 kartus). Taisyklės: -->
<!--  Jeigu kauliukų suma yra mažiau už 5 reiškia - jūs iškarto pralaimejote. -->
<!--  Jeigu kauliukų suma daugiau už 5 ir: -->
<!--  - išmesta buvo 6 ir 6, reiškia - laimėjote dviratį. -->
<!--  - abiejų kauliukų išmestas skaičius yra vienodas, bet ne 6 ir 6 - reiškia jūs -->
<!--  laimėjote bilietą į kiną. -->
<!--  - kitais atvejais – kauliukas metamas dar kartą. -->
<!--  - Žaidimas turi vykti iki kol žaidėjas laimės / pralaimės(while) -->
<!--  - Visa zaidimo eiga turėtų būti išvesta į ekraną -->
<!--3. Turime sveikų skaičių masyvą, kur skaičius atspindi daikto svorį: -->
<!--$things = [1, 7, 8, 1, 2, 8, 7, 4, 2, 3, 2, 4, 1, 6, 3, 7, 4, 1, 5, 6, 5, 2, 1, 12, 4]; -->
<!--$maxWeight = 8; -->
<!--$boxes = []; -->
<!--Parašyti algoritmą, kuris sudėtų daiktus į kuo mažiau dėžučių, įvertinant dėžutės maksimalų svorį -->