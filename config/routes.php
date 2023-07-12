<?php

// route dựa tên các thư mục,các controller(tên class trùng với tên controller),các phương thức. 
//ví dụ 'client/Home/home' 
// ở đây client là thư mục client,Home là controller,home là phương thức được định nghĩa trong lớp Home


// cấu hình route cho người dùng
$routes['default_controller'] = 'home'; 
$routes['trang-chu'] =  'client/Home/home';
$routes['san-pham'] =  'client/Product/index';
$routes['gio-hang'] =  'client/Cart/index';
$routes['them-gio-hang'] =  'client/Cart/cart';
$routes['mua-san-pham'] =  'client/Product/buyProduct';
$routes['tang-so-luong'] =  'client/Cart/plus';
$routes['giam-so-luong'] =  'client/Cart/minus';
$routes['xoa-gio-hang'] =  'client/Cart/delete';
$routes['thanh-toan'] =  'client/Payment/index';
$routes['thanh-toan-thanh-cong'] =  'client/Payment/bill';
$routes['danh-gia'] =  'client/Rating/review';
$routes['dang-nhap'] =  'auth/Login/index';
$routes['check-dang-nhap'] = 'auth/Login/checkAuth';
$routes['dang-ky'] =  'auth/Register/index';
$routes['dang-ky-tk'] =  'auth/Register/createAccount';
$routes['log-out'] =  'auth/Login/logout';

// cấu hình route cho admin
$routes['admin/quan-ly'] =  'admin/Manage/index';
$routes['admin/xoa-san-pham'] = 'admin/Manage/delete';
$routes['admin/form-sua-san-pham'] = 'admin/Manage/editProduct';
$routes['admin/sua-san-pham'] = 'admin/Manage/doEditProduct';
$routes['admin/don-hang'] = 'admin/Order/allOrder';
$routes['admin/chi-tiet-don-hang'] = 'admin/Order/detailInfor';
$routes['admin/san-pham'] = 'admin/Product/product';
$routes['admin/them-san-pham'] = 'admin/Product/createProduct';


