<?php
//Configuración global
require_once 'Config/global.php';
 
//Base para los controladores
require_once 'Core/ControllerBase.php';
 
//Funciones para el controlador frontal
require_once 'Core/ControllerFrontal.func.php';
 
//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
?>

