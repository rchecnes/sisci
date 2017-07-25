<?php
/*require_once('../App/Conectar.php');*/
class LoginC
{
    
    public function validar(){

        require_once 'Vendor/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('App/View');
        $twig = new Twig_Environment($loader, array(
                    'cache' => 'cache',
                    'debug' => 'true'));
                    
        $template = $twig->loadTemplate('Login/index.twig.html');
        echo $template->render(array());
    }

    public function index(){
        require_once 'Vendor/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('App/View');
        $twig = new Twig_Environment($loader, array(
                    'cache' => 'cache',
                    'debug' => 'true'));
                    
        $template = $twig->loadTemplate('Login/index.twig.html');
        echo $template->render(array());
    }
}
/*require_once 'Vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../View');
$twig = new Twig_Environment($loader, array(
            'cache' => 'cache',
            'debug' => 'true'));
            
$template = $twig->loadTemplate('Login/index.twig.html');
echo $template->render(array());*/
?>