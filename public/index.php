<?php

use mvc\core\app;

define("DS", DIRECTORY_SEPARATOR);
define("root", dirname(__DIR__));
define("app", root . DS . 'app' . DS);
define('controllers', app . 'controllers' . DS);
define('core', app . 'core' . DS);
define('models', app . 'models' . DS);
define('views', app . 'views' . DS);
define('url', 'http://localhost/IEEE/public/');
define('vendor', root . DS . 'vendor' . DS);
define('dsn', "mysql:host=localhost;dbname=IEEE"); //localhost>>
define('DB_USER', 'root'); //db_user
define('DB_PASS', ''); //db_password;
require_once vendor . 'autoload.php';
$obj_app = new app;
//echo $_SERVER['QUERY_STRING'];
