<?php

namespace App\Contorol;

//use Philo\Blade\Blade;
use eftec\bladeone\BladeOne;
class View
{
    public static function render($view,$args=[])
    {
        extract($args,EXTR_SKIP);
        $file="../App/Viwe/{$view}.php";
        if (is_readable($file)){
            require $file;
        }
    }

    public static function renderTemplate($template,$args=[])
    {
//        ShowTemplate();
        $views=realpath('../Views');
        $cache=realpath('../../storage/views');
        $blade=new BladeOne($views,$cache,BladeOne::MODE_AUTO);
        $blade->setPath($views,$cache);
        return $blade->run($template,$args=[]);
    }
}