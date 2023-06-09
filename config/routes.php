<?php


$routes['default_controller'] = 'home'; 
$routes['trang-chu'] =  'admin/home/index';
$routes['san-pham/(\d)'] =  'admin/product/edit/$1';
$routes['sua-doi/(\d)'] =  'admin/product/doEdit/$1';
$routes['xoa-san-pham/(\d)'] =  'admin/product/delete/$1';
$routes['tim-kiem'] =  'admin/product/search';


