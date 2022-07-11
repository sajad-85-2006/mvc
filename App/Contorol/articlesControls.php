<?php
namespace App\Contorol;

class articlesControls
{

    public function index()
    {
        $u= new View;
        return $u->renderTemplate("articel/index.blade.php");
    }

    public function create()
    {
        $u= new View;
        return $u->renderTemplate("articel/create");
    }

    public function edit($id)
    {
        $u= new View;
        return $u->renderTemplate("articel/edit",['id'=>$id]);
        echo 'salam';
    }
    public function delete($id)
    {
        $u= new View;
        return $u->renderTemplate("articel/delete",['id'=>$id]);
        echo 'salam';
    }

}
