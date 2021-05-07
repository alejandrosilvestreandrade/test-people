<?php

function loadController($controller)
{
    $controlador=ucwords($controller).'Controller';
    $strFileController='controller/'.$controlador.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controller/'.ucwords(CONTROLLER).'Controller.php';   
    }
    
    require_once $strFileController;
    $controllerObj=new $controlador();
    return $controllerObj;
}

function getAccion($controllerObj,$action)
{
    $accion=$action;
    $controllerObj->$accion();
}

function setAccion($controllerObj)
{
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"]))
    {
        getAccion($controllerObj, $_GET["action"]);
    }else{
        getAccion($controllerObj, ACTION);
    }
}