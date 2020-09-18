<?php
require('../bootloader.php');


$params = [
    [
        'name' => 'Rikis',
        'hunger_lvl' => rand(5, 15),
        'fatigue' => rand(5, 15),
        'strenght' => 33
    ],
    [
        'name' => 'Maksis',
        'hunger_lvl' => rand(5, 15),
        'fatigue' => rand(5, 15),
        'strenght' => 33
    ],
];

//$dog = new DOG($params);
//var_dump($dog);

//$db->setData($params);
//$db->save();

$db->load();
$dog_data = $db->getData();
//var_dump($dog_data);


$dogs =[];
foreach($dog_data as $dog){
    $dogs[] =new Dog($dog);
}
var_dump($dogs);

//$dog = new Dog($dog_data);
//var_dump($dog);

$dogs[0]->poop();
var_dump($dogs);



//kita uzduotis

$wife = new Wife();

//$wife->useKnife()->slice();

$wife->heel();

//$wife->health +=20;
//var_dump($wife);


$player = new Player();
var_dump($player);
$player->heel();
var_dump($player);


