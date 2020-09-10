<form class="form" method="POST">
  <div class="form__title">Registracija</div>
  <div class="input-group">
    <label for="email">Paštas</label>
    <input type="text" id="email" name="email">
  </div>
  <div class="input-group">
    <label for="password">Slaptažodis</label>
    <input type="password" id="password" name="password">
  </div>
  <div class="input-group">
    <label for="password">Pakartokite slaptažodį</label>
    <input type="password" id="password" name="repeat-password">
  </div>
  <div class="input-group">
    <label for="height">Ūgis</label>
    <input type="text" id="height" name="height">
  </div>
  <div class="input-group">
    <label for="age">Amžius</label>
    <input type="text" id="age" name="age">
  </div>
  <div class="input-group">
    <label for="fb-address">Facebook paskyros adresas</label>
    <input type="text" id="fb-address" name="fb-address">
  </div>
  <button type="submit">Registruotis</button>
  <input type="hidden" name="register" value="1">
</form>
<?php
$expected_inputs = ['email', 'password', 'repeat-password', 'height', 'age', 'fb-address'];

if (isset($_POST['register'])) {
  $validatedInputs = [];
  foreach ($expected_inputs as $inputName) {
    $validatedInput = filter_input(INPUT_POST, $inputName, FILTER_SANITIZE_SPECIAL_CHARS);
    $validatedInputs[$inputName] = $validatedInput;
  }
  var_dump($validatedInputs);
}








// if (isset($_POST['register'])) {
//   $email_validated = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//   var_dump($email_validated);

//   // var_dump(filter_input(INPUT_POST, 'password'));
//   // var_dump(filter_input(INPUT_POST, 'repeat-password'));

//   // Aukščiui nustatyti kad reikšmė būtų float tipo, ir būtų rėžiuose 0,3 iki 3
//   // var_dump(filter_input(INPUT_POST, 'height'));
//   $height_validated = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT, [
//     'options' => [
//       'min_range' => 30,
//       'max_range' => 300
//     ]
//   ]);
//   var_dump($height_validated);
  
//   // Amžiui patikrinti kad būtų nuo 18 iki 150 metų, ir kad būtų sveikasis skaičius
//   $age_validated = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, [
//     'options' => [
//       'min_range' => 18,
//       'max_range' => 180
//     ]
//   ]);
//   var_dump($age_validated);
//   // Patikrinti kad būtų domenas

//   $fb_validated = filter_input(INPUT_POST, 'fb-address', FILTER_VALIDATE_URL);
//   var_dump($fb_validated);
// }
