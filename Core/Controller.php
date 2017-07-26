<?php
class Controller{
 
    
    public function __construct() {

    }


    public function render($view, $data){
        
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

        $base_url = '';
        $base_folder = strtolower(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

        if (isset($_SERVER['HTTP_HOST']))
        {
            $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $base_url .= '://'. $_SERVER['HTTP_HOST'];
            $base_url .= $base_folder;
        } 

        header('Location:'.sprintf("Location: %s%s", $base_url, $controller.'/'.$method));

    }
 
}
?>