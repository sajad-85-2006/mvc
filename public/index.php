<?php
require '../vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::errorException');

$router=require '../App/Router.php';
$url=$_SERVER['QUERY_STRING'];
$link->dispatch($url);