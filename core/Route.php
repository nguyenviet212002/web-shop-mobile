<?php
class Route
{
  
  function handelRoute($url)//xử lí tên url và sử dụng biểu thức chính quy biến đổi giống với các controller muốn sử dụng 
  {
    global $routes;
    unset($routes['default_controller']);
    $url = trim($url, '/');
    $handelUrl = $url;
    if (!empty($routes)) {
      foreach ($routes as $key => $value) {
        if (preg_match('~' . $key . '~is', $url)) {
          $handelUrl = preg_replace('~' . $key . '~is', $value, $url);
        }
      }
    }
    return $handelUrl;
  }
}
