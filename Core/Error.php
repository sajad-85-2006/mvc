<?php

namespace Core;
require '../App/Contorol/View.php';
class Error
{
    public static function errorHandler($level,$message,$file,$line)
    {
        if (error_reporting()!==0){
            throw new \ErrorException($message,0,$level,$file,$line);
//            var_dump($message);
        }
    }
    public static function errorException($exception)
    {
        $code=$exception->getCode();
        if ($code != 404){
            $code=500;
        }
        http_response_code($code);
        if (false){
            echo '<h1>fatal error</h1>';
            echo '<p>Uncaught Exception</p>"'.get_class($exception).'"</p>';
            echo '<p>Uncaught Exception</p>"'.$exception->getMessage().'"</p>';
            echo '<p>Uncaught Exception</p>"'.$exception->getFile().'"</p>';
            echo '<p>Uncaught Exception</p>"'.$exception->getLine().'"</p>';
        }else{
            $log='C:/xampp2/htdocs/mvc/storage/Logs/'.date('Y.m.d').'.txt';
//            var_dump($log);
//            var_dump($log);
            ini_set('error_log',$log);
//            echo $exception->getCode();
            $massage= 'fatal error\n';
            $massage.= ' Uncaught Exception"'.get_class($exception).'"</p>';
            $massage.= ' Uncaught Exception"'.$exception->getMessage().'"</p>';
            $massage.= ' Uncaught Exception"'.$exception->getFile().'"</p>';
            $massage.= ' Uncaught Exception"'.$exception->getLine().'"</p>';
            error_log($massage);
            echo \App\Contorol\View::renderTemplate("Error/{$code}");
        }
    }
}
