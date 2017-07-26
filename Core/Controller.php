<?php
class Controller{
 
    /*public function __construct() {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
         
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }*/
     
    //Plugins y funcionalidades
     
/*
* Este método lo que hace es recibir los datos del controlador en forma de array
* los recorre y crea una variable dinámica con el indice asociativo y le da el 
* valor que contiene dicha posición del array, luego carga los helpers para las
* vistas y carga la vista que le llega como parámetro. En resumen un método para
* renderizar vistas.
*/  
    public function __construct() {

    }


    public function view($view, $data){
        
        require_once 'Vendor/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('App/View');
        $twig = new Twig_Environment($loader, array(
                    'cache' => 'cache',
                    'debug' => 'true'));
                    
        $template = $twig->loadTemplate($view);
        
        echo $template->render($data);
    }
     
    public function redirect($controller,$method){


        
        //header("Location:".$controller."/".$method."/");

        header('Location: /'.$controller.'/'.$method);

        /*$controller = $controller.'Controller';

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
        }*/
    }
     
    //Métodos para los controladores
 
}
?>