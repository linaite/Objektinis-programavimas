<?php
// PIRMA UŽDUOTIS
$cost = 3;
$initialMoney = rand(45, 45);
$beersView = '';
$beerCount = floor($initialMoney / $cost);
for ($i = 0; $i < $beerCount; $i++) {
  $beersView .= '<div class="beer"></div>';
}
?>

<!-- <h3>Pirma užduotis</h3>
<div class="beer-container">
  <?= $beersView; ?>
</div> -->

<?php
// ANTRA UŽDUOTIS
$beerCount = floor($initialMoney / $cost);
$beerContainersView = '';
$beersView = '';
for ($i = 1; $i <= $beerCount; $i++) {
  $beersView .= '<div class="beer"></div>';
  $totalPrice = $i * $cost;
  $totalPriceView = "<div>$totalPrice</div>";
  $beerContainersView .= '
  <div class="beer-container">
    ' . $totalPriceView . '
    ' . $beersView . '
  </div>';
}
?>
<!-- 
<h3>Antra užduotis</h3>
<div><?= $beerContainersView; ?></div> -->

<?php
// TREČIA UŽDUOTIS
$beerCount = floor($initialMoney / $cost);
$beerContainersView = '';
for ($i = 1; $i <= $beerCount; $i++) {
  $beersView = str_repeat('<div class="beer beer--empty"></div>', $i - 1);
  $beersView .= '<div class="beer"></div>';
  $totalPrice = $i * $cost;
  $totalPriceView = "<div>$totalPrice</div>";
  $beerContainersView .= '
    <div class="beer-container">
      ' . $totalPriceView . '
      ' . $beersView . '
    </div>';
}
?>

<!-- <h3>Trečia užduotis</h3>
<div><?= $beerContainersView; ?></div> -->


<?php
// KETVIRTA UŽDUOTIS
$currentTime = time();
$timePassed = 0;
$beerCount = floor($initialMoney / $cost);
$beerContainersView = '';
for ($i = 1; $i <= $beerCount; $i++) {
  $beersView = str_repeat('<div class="beer beer--empty"></div>', $i - 1);
  $beersView .= '<div class="beer"></div>';
  $totalPrice = $i * $cost;
  $totalPriceView = "<div>$totalPrice</div>";
  $time = date("h:i", $currentTime + $timePassed * 60);
  $timePassed += rand(25, 30);
  $timeView = "<div>$time</div>";
  $beerContainersView .= '
    <div class="beer-container">
      <div class="beer-container__info">
        ' . $timeView . '
        ' . $totalPriceView . '
      </div>
      ' . $beersView . '
    </div>';
}
?>

<!-- <h3>Ketvirta užduotis</h3>
<div><?= $beerContainersView; ?></div> -->

<!--  PENKTA UŽDUOTIS -->
<?php
$currentTime = time();
$timePassed = 0;
$beerCount = floor($initialMoney / $cost);
$beerContainersView = '';
$everyNth = 4;
$effect = '';
?>
<style>
  <?php
  for ($i = 1; $i <= ceil($beerCount / $everyNth); $i++) {
    print '
      .beer.beer--effect-' . $i . '{
        opacity: ' . (1 - $i / 4) . ';
      }';
  }
  ?>
</style>
<?php
for ($i = 1; $i <= $beerCount; $i++) {
  $beersView = '';
  for ($j = 1; $j <= $i; $j++) {
    $className = 'beer'. 
      ($i === $j ? ' beer--empty' : '') .
      ($j >= $everyNth ? ' beer--effect-' . floor($j / $everyNth) : '');
    $beersView .= '<div class="'.$className.'"></div>';
  }
  $totalPrice = $i * $cost;
  $totalPriceView = "<div>$totalPrice</div>";
  $time = date("h:i", $currentTime + $timePassed * 60);
  $timePassed += rand(25, 30);
  $timeView = "<div>$time</div>";
  $beerContainersView .= '
    <div class="beer-container">
      <div class="beer-container__info">
        ' . $timeView . '
        ' . $totalPriceView . '
      </div>
      ' . $beersView . '
    </div>';
}
?>

<h3>Penkta užduotis</h3>
<div><?= $beerContainersView; ?></div>