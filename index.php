<?php
/*//Configuración global
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
}*/

//SEGUNDA FORMA
$url = isset($_GET['url'])?$_GET['url']:"Index/index";
$url = explode("/", $url);

$controller = "";
$method = "";

if (isset($url[0])) {
	$controller = $url[0];
}

if (isset($url[1])) {
	if ($url[1]!='') {
		$method = $url[1];
	}
}

print_r($controller);
print_r($method);

?>

