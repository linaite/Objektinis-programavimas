<!------------------------Asociatyvūs masyvai----------------- -->
<!--1. Sukurti masyvą, kuris aprašytų knygos duomenis: title, author, year, genre -->
<?php
$book1 = [
  'title' => 'Alisa stebuklų šalyje',
  'author' => 'Lewis Carroll',
  'year' => 1865,
  'genre' => ['Adventure', 'Drama', 'Fantasy']
];
// print $book1['year']; // 1865
// print $book1['genre'][1]; // Drama

?>
<!--2. Sukurti masyvą, kurio elementai būtų masyvai aprašantys knygas -->
<?php
$books = [
  [
    'title' => 'Alice in wonderland',
    'author' => 'Lewis Carroll',
    'year' => 1865,
    'genres' => ['Adventure', 'Drama', 'Fantasy']
  ],
  [
    'title' => 'The Decameron',
    'author' => 'Giovanni Boccaccio',
    'year' => 1353,
    'genres' => ['Story collection']
  ],
  [
    'title' => 'The 120 Days of Sodom',
    'author' => 'Marquis de Sade',
    'year' => 1789,
    'genres' => ['Novel']
  ],
  [
    'title' => 'Droll Stories',
    'author' => 'Honoré de Balzac',
    'year' => 1837,
    'genres' => ['Short stories']
  ]
]
?>
<!--3. Išvesti visus knygų masyvo elementus su var_dump; -->
<?php
foreach ($books as $book) {
  // var_dump($book);
}
?>
<!--4. Išvesti visų knygų pavadinimus, atskirtu kableliu ir tarpu -->
<?php
// 4.1 - Naudojant ternary operatorių
// foreach ($books as $index => $book) {
//   print $book['title'] . ($index === count($books) - 1 ? null : ', ');
// }
// echo '<hr/>';
// // 4.2 - Naudojant substr funkciją
// $bookListView = '';
// $separator = ', ';
// foreach ($books as $book) {
//   $bookListView .= $book['title'] . $separator;
// }
// print substr($bookListView, 0, -1 *(strlen($separator)));
// echo '<hr/>';

// // 4.3 - Naudojant (array) join metodą - Geriausias dėl "single responsibility" design principo
// $bookTitles = [];
// foreach ($books as $book) {
//   $bookTitles[] = $book['title'];
// }
// print join(', ', $bookTitles);
// echo '<hr/>';
?>
<!--5. Išvesti visus knygų masyvo elementus lentele; -->
<?php
$gridRowsView = '';
// 5.1 - Formuojant kaip stringus
foreach ($books as $book) {
  $gridRowView = '<div class="grid-books__row">';
  $gridRowView .= '<div class="grid-books__col">' . $book['title'] . '</div>';
  $gridRowView .= '<div class="grid-books__col">' . $book['author'] . '</div>';
  $gridRowView .= '<div class="grid-books__col">' . $book['year'] . '</div>';
  $gridRowView .= '<div class="grid-books__col">' . join(', ', $book['genres']) . '</div>';
  $gridRowView .= '</div>';
  $gridRowsView .= $gridRowView;
}
?>
<!-- <div class="grid-books">
  <div class="grid-books__row grid-books__row--header">
    <div class="grid-books__col">Pavadinimas</div>
    <div class="grid-books__col">Autorius</div>
    <div class="grid-books__col">Metai</div>
    <div class="grid-books__col">Žanrai</div>
  </div>
  <?= $gridRowsView ?>
</div> -->

<?php
// 5.2 Formuojant tiesiai į HTML - Šiuo atveju geresnis variantas
function printBooks($books, $title)
{
?>
  <h3><?= $title?></h3>
  <div class="grid-books">
    <div class="grid-books__row grid-books__row--header">
      <div class="grid-books__col">Pavadinimas</div>
      <div class="grid-books__col">Autorius</div>
      <div class="grid-books__col">Metai</div>
      <div class="grid-books__col">Žanrai</div>
    </div>
    <?php foreach ($books as $book) : ?>
      <div class="grid-books__row">
        <div class="grid-books__col"><?= $book['title'] ?></div>
        <div class="grid-books__col"><?= $book['author'] ?></div>
        <div class="grid-books__col"><?= $book['year'] ?></div>
        <div class="grid-books__col"><?= join(', ', $book['genres']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
<?php
}
printBooks($books, 'All Books');
?>
<!--6. Išvesti visų visų knygų metų vidurkį; -->
<?php
// 6.1 - Būdas pagal formulę
$sum = 0;
foreach ($books as $book) {
  $sum += $book['year'];
}
$yearAvg = $sum / count($books);
?>
<div><?= $yearAvg ?></div>

<?php
// 6.2 - Iteracinis būdas
$yearAvg = 0;
foreach ($books as $book) {
  $yearAvg += $book['year'] / count($books);
}
?>
<div><?= $yearAvg ?></div>

<!--7. Išrikiuoti masyvą pagal metus; -->
<?php
function byYear($currentYear, $nextYear){
    return $currentYear['year']-$nextYear['year'];
}
$bookSortedByYear = $books;
usort($bookSortedByYear, 'byYear');
printBooks($bookSortedByYear,'Knygos isrikiuotos pagal metus');
?>
<!--8. Išrikiuoti masyvą pagal pavadinimus -->
<?php
function byTitle($currentTitle, $nextTitle){
    return strcmp($currentTitle['title'], $nextTitle['title']);
}
$bookSortedByTitle = $books;
usort($bookSortedByTitle, 'byTitle');
printBooks($bookSortedByTitle,'Knygos isrikiuotos pagal pavadinima');

?>
<!--9.Isrikiuoti masyva pagal kiek rusiu zanru yra-->
<?php
function byGenre($currentBook, $nextBook){
    return count($currentBook['genre']) - count($nextBook['genre']);
}
$bookSortedByBook = $books;
usort($bookSortedByBook, 'byGenre');
printBooks($bookSortedByBook,'Knygos isrikiuotos pagal genre');
?>
