<?php
$availableButtons = [
  [
    'name' => 'primary',
    'available' => 1
  ],
  [
    'name' => 'secondary',
    'available' => 1
  ],
  [
    'name' => 'success',
    'available' => 1
  ],
  [
    'name' => 'warning',
    'available' => 1
  ],
  [
    'name' => 'danger',
    'available' => 1
  ],
];
function selectBtnType($number){
  global $availableButtons;
  $attempt = 0;
  while($attempt < count($availableButtons) ){
    $index = $number % count($availableButtons);
    if($availableButtons[$index]['available'] >0){
      $availableButtons[$index]['available']--;
      return $availableButtons[$index]['name'];
    }
    $number++;
    $attempt++;
  }
  throw new Exception("There are no buttons available", 1);
}

  $buttons = '';
  for ($i=0; $i < 5; $i++) { 
    $btnType = selectBtnType(rand(0,4));
    $buttons .=  "<div class=\"btn btn--$btnType\">".ucfirst($btnType)."</div>";
  }
?>
<h2>Mygtukai</h2>
<div class="btn-container"><?= $buttons?></div>