<?php

//1. Persirašykite masyvą sudarytą iš skaičių
define('INIT_ARRAY', [7, 2, 8, 4, 5, 7, 16, -5, -6, -7, 15.22, 1.66, -69.55, 1, 1, 5, 7, 5]);

//2.  Padauginti esamo masyvo narius iš 2
$array_double = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    $array_double[] = INIT_ARRAY[$i] * 2;
}
var_dump($array_double);

//3.Pakelti masyvo narius kvadratu
$array_qud = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    $array_qud[] = INIT_ARRAY[$i] ** 2;
}
var_dump($array_qud);

//4.Padauginti masyvo narius iš jų index'o (vietos masyve)
$array_index = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    $array_index[] = INIT_ARRAY[$i] * $i;
}
var_dump($array_index);

//5. Atrinkti tiktai teigimų elementų masyvą
$positive = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (INIT_ARRAY[$i] > 0) {
        $positive[] = INIT_ARRAY[$i];
    }
}
var_dump($positive);

//6. Atrinkti tiktai neigiamų elementų masyvą
$negative = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (INIT_ARRAY[$i] < 0) {
        $negative[] = INIT_ARRAY[$i];
    }
}
var_dump($negative);

//7. Atrinkti tiktai lyginių skaičių masyvą
$even = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (gettype(INIT_ARRAY[$i]) === 'integer' && INIT_ARRAY[$i] % 2 === 0) {
        $even[] = INIT_ARRAY[$i];
    }
}
var_dump($even);

//8. Atrinkti tiktai nelyginių skaičių masyvą

$odd = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (gettype(INIT_ARRAY[$i]) === 'integer' && INIT_ARRAY[$i] % 2 !== 0) {
        $odd[] = INIT_ARRAY[$i];
    }
}
var_dump($odd);

//10. Visas neigiamas vertes masyve padaryti teigiamomis

$make_positive = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (INIT_ARRAY[$i] < 0) {
        $make_positive[] = INIT_ARRAY[$i] * -1;
    } else {
        $make_positive[] = INIT_ARRAY[$i];
    }
}
var_dump($make_positive);

//11. Pakelti visas masyvo reikšmes laipsniu 'index'
$array_power_index = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    $array_power_index[] = INIT_ARRAY[$i] ** $i;
}
var_dump($array_power_index);

//12.Atrinkti tik natūralių skaičių masyvą
$array_natural = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (gettype(INIT_ARRAY[$i]) === 'integer' && INIT_ARRAY[$i] > 0) {
        $array_natural[] = INIT_ARRAY[$i];
    }
}
var_dump($array_natural);

//13.Suapvalinti visas masyvo reikšmes iki sveikų skaičių
$array_integers = [];

for ($i = 0; $i < count(INIT_ARRAY); $i++) {
    if (gettype(INIT_ARRAY[$i]) !== 'integer') {
        $array_integers[] = intval(round(INIT_ARRAY[$i]));
    } else {
        $array_integers[] = INIT_ARRAY[$i];
    }
}
var_dump($array_integers);

//14. Atrinkti kas antrą elementą
$array_every2 = [];

for ($i = 0; $i < count(INIT_ARRAY); $i+=2) {
    $array_every2[] = INIT_ARRAY[$i];
}
var_dump($array_every2);

//16. Atrinkti kas penktą elementą
$array_every5 = [];

for ($i = 0; $i < count(INIT_ARRAY); $i += 5) {
    $array_every5[] = INIT_ARRAY[$i];
}
var_dump($array_every5);












