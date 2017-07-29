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

        //print_r($this->dbpdo());

       //$this->render('Login/home.twig.html',array());

        $usuario = $_POST['usuario'];
        $password = md5($_POST['password']);

        $sql = $this->db()->query("SELECT * FROM usuario WHERE usuario='$usuario' AND salt='$password'");
 
        if($row = $sql->fetch_object()) {
         
           //print_r($row->salt);

           $this->redirect('Home','index');
           //echo "Hola ya llegue arriba";

        }else{
            //echo "Llega a falso";
            $this->redirect('Login','index');
            //echo "Hola ya llegue abajo";
        }

        
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