<?php
class Controller
{
    public function model($model) //nhận các tên model đẩy vào để trả ra các model cần sử dụng 
    {
        if (file_exists(_DIR_ROOT_ . '/app/models/' . $model . '.php')) {
            require_once _DIR_ROOT_ . '/app/models/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        } else {
            echo '404: khong co file Model';
        }
    }
    public function render($view,$data=[]) //nhận các tên view đẩy vào để trả ra các view cần sử dụng 
    {    
        extract($data);
        if (file_exists(_DIR_ROOT_ . '/app/views/' . $view . '.php')) {
            require_once _DIR_ROOT_ . '/app/views/' . $view . '.php';
        } else {
            echo '404: khong co file view';
        }
    }
}
