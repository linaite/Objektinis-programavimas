<?php
// PRISIJUNGIMAS
$users = [
  [
    'id' => 'olksajdfngjdsafng',
    'email' => 'zilvinas.vidmantas.93@gmail.com',
    'password' => 'Labas123',
    'role' => 'default'
  ],
  [
    'id' => 'olksajdfnfdisafng',
    'email' => 'admin@gmail.com',
    'password' => 'Labas123',
    'role' => 'admin'
  ]
];
function validateUser($email, $password)
{
  // Kai užaugsiu būsiu duomenų bazė
  global $users;
  foreach ($users as $user) {
    if ($email === $user['email'] && $password === $user['password']) {
      return $user;
    }
  }
  return false;
}
if (isset($_POST['login'])) {
  // Kai uždaugsiu būsiu validacija;
  $userValidated = validateUser($_POST['email'], $_POST['password']);
}
?>

<form class="form" method="POST">
  <div class="form__title">Prisijungimas</div>
  <div class="input-group">
    <label for="email">Paštas</label>
    <input type="email" id="email" name="email">
  </div>
  <div class="input-group">
    <label for="password">Slaptažodis</label>
    <input type="password" id="password" name="password">
  </div>
  <button type="submit">Prisijungti</button>
  <input type="hidden" name="login" value="1">
</form>

<?php if (isset($_POST['login'])) : ?>
  <?php if ($userValidated) : ?>
    <h3 class="text--success">Prisijunėte sėkmingai</h3>
  <?php else : ?>
    <h3 class="text--error">Prisijungti nepavyko</h3>
  <?php endif; ?>
<?php endif; ?>

<hr>
<!-- REGISTRACIJA -->
<!-- 
  1. Sukurti registracijos formą su 3 įvesties laukais:
    email,
    password,
    repeat-password
  2. Nustatyti formai POST HTTP request tipą
  3. Submit'inant formą turi būti išvedama į ekraną (po forma):
    Slaptažodžių sutapimo atvėju -> Registracija sėkminga
    Slaptažodžių NEsutapimo atvėju -> Registracija nepavyko
 -->
<?php
  function isEqual($val1, $val2){
    return $val1 === $val2;
  }
  if (isset($_POST['register'])) {
    $passwordsAreEqual = isEqual($_POST['password'], $_POST['repeat-password']);
  }
?>
<form class="form" method="POST">
  <div class="form__title">Registracija</div>
  <div class="input-group">
    <label for="email">Paštas</label>
    <input type="email" id="email" name="email">
  </div>
  <div class="input-group">
    <label for="password">Slaptažodis</label>
    <input type="password" id="password" name="password">
  </div>
  <div class="input-group">
    <label for="password">Pakartokite slaptažodį</label>
    <input type="password" id="password" name="repeat-password">
  </div>
  <button type="submit">Registruotis</button>
  <input type="hidden" name="register" value="1">
</form>

<!-- Jeigu buvo pa'submit'inta registracijos forma -->
<?php if (isset($_POST['register'])) : ?> 
  <?php if ($passwordsAreEqual) : ?>
    <h3 class="text--success">Registracija sėkminga</h3>
    <!-- Kitas kodas kuris nukreipia į pagrindinį puslapį -->
  <?php else : ?>
    <h3 class="text--error">Registracija nepavyko</h3>
    <!-- Kitas kodas, kuris išspausdina klaidas -->
  <?php endif; ?>
<?php endif; ?>

<!-- SAVAITĖS DIENA -->
<!-- 
  Sukurti POST tipo formą, kurią pasubmitinus,
būtų atspausdinama savaitės diena po mygtuku (Lietuviškai)
-->
<?php if (isset($_POST['week-day'])) {
  $weekDay;
  switch (date('N')) {
    case 1: $weekDay = 'Pirmadienis'; break;
    case 2: $weekDay = 'Antradienis'; break;
    case 3: $weekDay = 'Trečiadienis'; break;
    case 4: $weekDay = 'Kevtvirtadienis'; break;
    case 5: $weekDay = 'Penktadienis'; break;
    case 6: $weekDay = 'Šeštadienis'; break;
    case 7: $weekDay = 'Sekmadienis'; break;
    default: throw new Exception("Nera šitoj planetoje daugiau nei 7 savaitės dienų");
  }
}
?>
<form class="form" method="POST">
    <input type="submit" value="Spausdinti dieną">
    <input type="hidden" name="week-day" value="1" />
</form>
<?php if (isset($_POST['week-day'])): ?>
  <div class="text--success"><?= $weekDay?></div>
<?php endif; ?>
