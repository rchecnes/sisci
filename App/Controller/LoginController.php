<?php
require_once('Core/Controller.php');

class LoginController extends Controller{
     
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        
        
        $this->render('Login/index.twig.html',array());
    }
    
    public function validar(){
        //echo $_SERVER['DOCUMENT_ROOT'];
        //echo $_SERVER['HTTP_HOST'];
       //echo "Hola en esta seccion se valida el acceso al usuario";
       //$this->redirect('Login','home');
       $this->render('Login/home.twig.html',array());
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