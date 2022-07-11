<?php

$link=new Core\Routers() ;
$link->add('//','articlesControls@index');
$link->add('/articles','articlesControls@index');
$link->add('/articles/create','articlesControls@create');
$link->add('/articles/delete/{id}','articlesControls@delete');
$link->add('/articles/edit/{id}','articlesControls@edit');