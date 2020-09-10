<?php
// 1. Sukurti prekių masyvą, kur kiekviena prekė turėtų savybes:
// id, title, description, price, leftInStock, imgPath, categories[]


//  2. generate_item_array
/**
 * Sugeneruoja nurodytą kiekį prekių
 *
 * @param int $count prekių kiekis
 * @param array $titles galimų pavadinimų masyvas
 * @param array $descriptions galimų aprašų masyvas
 * @param array $price_range masyvas su 2 vertėmis, minimali ir po jo maksimali prekės kaina
 * @param array $in_stock_range masyvas su 2 vertėmis, minimalus ir po jo maksimalus prekių kiekis
 * @param array $images galimų nuotraukų masyvas
 * @param array $categories galimų kategorijų masyvas
 *
 * @return array sugeneruotų prekių masyvas
 */
function generate_item_array($count, $titles, $descriptions, $price_range, $in_stock_range, $images, $categories)
{
    $items = [];
    for ($i = 0; $i < $count; $i++) {
        $items[] = generate_item($titles, $descriptions, $price_range, $in_stock_range, $images, $categories);
    }
    return $items;
}


// 4. generate_item - iškelti logiką iš generate_item_array funkcijos, atsakingą už vienos prekės kūrimą
/**
 * Sugeneruoja prekę
 *
 * @param array $titles galimų pavadinimų masyvas
 * @param array $descriptions galimų aprašų masyvas
 * @param array $price_range masyvas su 2 vertėmis, minimali ir po jo maksimali prekės kaina
 * @param array $in_stock_range masyvas su 2 vertėmis, minimalus ir po jo maksimalus prekių kiekis
 * @param array $images galimų nuotraukų masyvas
 * @param array $categories galimų kategorijų masyvas
 *
 * @return array sugeneruotų prekių masyvas
 */
function generate_item($titles, $descriptions, $price_range, $in_stock_range, $images, $categories)
{
    return [
        'id' => uniqid(),
        'title' => $titles[rand(0, count($titles) - 1)],
        'description' => $descriptions[rand(0, count($descriptions) - 1)],
        'price' => rand($price_range[0], $price_range[1] - 1) + rand(0, 99) / 100,
        'in_stock' => rand($in_stock_range[0], $in_stock_range[1]),
        'image' => $images[rand(0, count($images) - 1)],
        'categories' => $categories[rand(0, count($categories) - 1)],
    ];
}

// 5. render_item_card
/**
 * Atvaizduoja prekę suformuotą kaip HTML koretelę
 *
 * @param array $item - prekė kuri bus atvaizduojama
 */

function render_item_card($item)
{
    ?>
    <div class="card">
        <img class="card__image" src="<?php print $item['image']; ?>" alt="photo">
        <div class="card__content">
            <h4><?php print $item['title']; ?></h4>
            <p><?php print $item['description']; ?></p>
            <span>Left in stock: <?php print $item['in_stock']; ?></span>
            <span>Category: <?php print $item['categories']; ?></span>
        </div>
    </div>
    <?php
    return $item;
}

// 6. render_item_grid
/**
 * Atvaizduoja prekių masyvą koretelėmis
 *
 * @param array $items - prekių masyvas
 */


function render_item_grid($items)
{
    ?>
    <div class="all__cards">
        <?php
        foreach ($items as $item) {
            render_item_card($item);
        }
        ?>
    </div>
    <?php
    return $items;
}

// 7. render_item_row
/**
 * Atvaizduoja prekę suformuotą kaip HTML eilutę
 *
 * @param array $item - prekė kuri bus atvaizduojama
 */

function render_item_row($item)
{
    ?>
    <div><?php print "{$item['image']}, {$item['title']}, {$item['description']}, {$item['in_stock']}, {$item['categories']}" ?></div>
    <?php
    return $item;
}

// 8. render_item_table
/**
 * Atvaizduoja prekių masyvą lentele
 *
 * @param array $items - prekių masyvas
 */

function render_item_table($items)
{
    ?>
    <div class="table">
        <div class="table__titles table__row">
            <div>Image</div>
            <div>Title</div>
            <div>Description</div>
            <div>Price</div>
            <div>Left in stock</div>
            <div>Category</div>
        </div>
        <?php foreach ($items as $item): ?>
            <div class="table__row">
                <div><img src="<?= $item['image']; ?>" alt=""></div>
                <div><?= $item['title']; ?></div>
                <div><?= $item['description']; ?></div>
                <div><?= $item['price']; ?></div>
                <div><?= $item['in_stock']; ?></div>
                <div><?= $item['categories']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return $items;
}


