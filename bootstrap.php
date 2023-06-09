<?php
define('_DIR_ROOT_',__DIR__);

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
}else {
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
}

$folder = strstr(strtolower(_DIR_ROOT_),'mvc');
$web_root = $web_root.'/'.$folder;

define('_FOLDER_ROOT_',$web_root);

require_once 'config/routes.php';
require_once 'config/database.php';
require_once 'core/Database.php';
require_once 'app/App.php';
require_once 'core/Route.php';
require_once 'core/Controller.php';