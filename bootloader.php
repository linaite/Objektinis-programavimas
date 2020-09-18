<?php
session_start();
define('ROOT', __DIR__);
//var_dump(ROOT);
define('DB_FILE', ROOT . '/app/data/db.json');
require('core/classes/FileDB.php');
require('core/functions/html.php');
require('core/functions/form/core.php');
require('core/functions/form/validators.php');
require('core/functions/file.php');
require('app/functions/form/validators.php');
require('app/functions/auth.php');
require('app/functions/html.php');

require('core/classes/Dog.php');
require('core/classes/Knife.php');
require('core/classes/Wife.php');
require('core/classes/Knife.php');
require('core/classes/Aspirine.php');
require('core/classes/Knife.php');
require('core/classes/Player.php');
require('core/classes/Potion.php');




