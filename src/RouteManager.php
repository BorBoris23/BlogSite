<?php

final class RouteManager
{
    public static function getInstance() : RouteManager
    {
        if(null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}







//public static function getInstance() : Config
//{
//    if(null === static::$instance) {
//        static::$instance = new static();
//    }
//    return static::$instance;
//}