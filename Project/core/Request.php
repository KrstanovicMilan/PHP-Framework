<?php

namespace app\core;

class Request{

    public function path(){
        $path = $_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path , "?");

        if($position === false ){
            return $path;
        }

        $path = substr($path , 0 , $position);

        return $path;

    }

    public function method(){
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function all(){
        return $_REQUEST;
    }

    public function one($parameterName){
        return $_REQUEST[$parameterName] ?? NULL; //   $_REQUEST[$parametarName] ?? NULL
    }
}