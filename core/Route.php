<?php 
class Route{

    function handelRoute($url)
    {
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url,'/');
        $handelUrl = $url;
        if (!empty($routes)) {
            foreach($routes as $key => $value){
          if (preg_match('~'.$key.'~is',$url)) {
           $handelUrl = preg_replace('~'.$key.'~is',$value,$url);
          }
        }
        }
        // foreach($routes as $key => $value){
        //     $formatRoute = $value.$key; 
        //     if ($key == $handelUrl) {
        //        $handelUrl = str_replace($key, "", $formatRoute );
        //        foreach($routes as $key => $value){
        // }

       return $handelUrl;
    }
}