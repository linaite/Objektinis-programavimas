<?php
session_start();
define('ROOT', __DIR__);
//var_dump(ROOT);
define('DB_FILE', ROOT.'/app/data/db.json');
require('core/functions/html.php');
require('core/functions/form/core.php');
require('core/functions/form/validators.php');
require ('core/functions/file.php');
require('app/functions/form/validators.php');

