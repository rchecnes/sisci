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
require_once 'Config/global.php';

$url = isset($_GET['url'])?$_GET['url']:CONTROLADOR_DEFECTO."/".ACCION_DEFECTO;
$url = explode("/", $url);

$controller = "";
$method = "";

if (isset($url[0])) {
	$controller = $url[0].'Controller';
}

if (isset($url[1])) {
	if ($url[1]!='') {
		$method = $url[1];
	}
}

$controllerPath = 'App/Controller/'.$controller.'.php';

if (file_exists($controllerPath)) {
	require_once($controllerPath);

	$controller = new $controller();
	
	if (isset($method)) {
		if (method_exists($controller, $method)) {
			$controller->{$method}();
		}else{
			echo "Error, el méthodo ".$method." no existe";
		}
	}
}else{
	echo "Error en la direccion no existe el controlador";
}

?>

