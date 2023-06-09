<?php
class App
{

    private $__controller, $__action, $__params, $__routes;

    function __construct()
    {
        global $routes;
        $this->__routes =  new Route();
        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }

        $this->__action = 'index';
        $this->__params = [];
        $this->handelUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER[('PATH_INFO')])) {
            $url  = $_SERVER[('PATH_INFO')];
        } else {
            $url  = '/';
        };
        return $url;
    }
    function handelUrl()
    {
        $url = $this->getUrl();
        $url = $this->__routes->handelRoute($url);
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
        $urlhandel = '';
        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlhandel .= $item . '/';
                $fileCheck = rtrim($urlhandel, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck =  implode('/', $fileArr);
                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/controllers/' . ($fileCheck) . '.php')) {
                    $urlhandel = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }

        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        if (file_exists('app/controllers/' . ($urlhandel) . '.php')) {
            require_once 'controllers/' . ($urlhandel) . '.php';
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
                if (!empty($urlArr[1])) {
                    $this->__action = $urlArr[1];
                    unset($urlArr[1]);
                }
                $this->__params = array_values($urlArr);

                if (method_exists($this->__controller, $this->__action)) {
                    call_user_func_array([$this->__controller, $this->__action], $this->__params);
                } else {
                    echo ('404: Loi khong co lop hoac phuong thuc truyen vao hoac khong co doi so');
                }
            } else {
                echo ('404: Loi khong co lop hoac lop khong dung');
            }
        } else {
            echo ('404: Loi url');
        }
    }
}
