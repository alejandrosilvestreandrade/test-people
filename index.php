<?php
require_once 'config/global.php';
require_once 'core/Controller.func.php';
require_once 'core/Controller.php';

if(isset($_GET["controller"]))
{
    $controllerObj=loadController($_GET["controller"]);
    setAccion($controllerObj);
}else{
    $controllerObj=loadController(CONTROLLER);
    setAccion($controllerObj);
}