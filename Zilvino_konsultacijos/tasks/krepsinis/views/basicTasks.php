<?php
include 'utils/basicFunctions.php';

//sugeneruoja viena preke

$item = generate_item(
    ITEM_TITLES,
    ITEM_DESC,
    [50,150],
    [0,300],
    ITEM_IMG,
    ITEM_CATEGORIES);

//var_dump($item);

// 3. Sugeneruoti prekių masyvą sudarytą iš 4 prekių
$items= generate_item_array(
    4,
    ITEM_TITLES,
    ITEM_DESC,
    [50,150],
    [0,300],
    ITEM_IMG,
    ITEM_CATEGORIES
);
//
//var_dump($items);

//generuoja kortele
//render_item_card($item);

//generuoja visu prekiu korteles
render_item_grid($items);

//Atvaizduoja prekę suformuotą kaip HTML eilutę
render_item_row($item);

//atvaizduoja lentele su prekemis
render_item_table($items);