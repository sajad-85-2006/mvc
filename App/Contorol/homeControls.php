<?php

namespace App\Contorol;

class homeControls
{
    public function index()
    {
        $u= new View;
        return $u->renderTemplate("articel.index");
    }
}