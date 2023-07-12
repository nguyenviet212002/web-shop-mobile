<?php
define('_DIR_ROOT_', __DIR__); // gán biến SERVER vào _DIR_ROOT_

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}


$folder = strstr(strtolower(_DIR_ROOT_), 'web-shop-mobile'); //nối tên SERVER và web-ban-hang-mvc
$web_root = $web_root . '/' . $folder; //thêm dấu '/' 

define('_FOLDER_ROOT_', $web_root); //gán biến SERVER và tên dự án http://localhost/web-ban-hang-mvc cho _FOLDER_ROOT_

// require tất cả các thư mục cần sử dụng
require_once 'config/routes.php';
require_once 'config/database.php';
require_once 'core/Database.php';
require_once 'app/App.php';
require_once 'core/Route.php';
require_once 'core/Controller.php';
require_once 'app/controllers/client/Home.php';
