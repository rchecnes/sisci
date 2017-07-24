<?php
/*require_once('../App/Conectar.php');

class Login extends Conexion
{
    private $usuario;
    private $password;

    public function __construct()
    {
        parent::__construct();
        parent::__destruct();
    }
    public function valid($usuario, $password)
    {
        $this->usuario = $this->clean($usuario);
        $this->password = $this->clean($password);

        $query = "SELECT * FROM usuario WHERE usuario='".$this->usuario."' AND password='".$this->password."'";
        return $this->dbExecute($query);//Devuelve resultado de consulta
    }

}*/

require_once '../Vendor/Twig/Autoloader.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../View');

$twig = new Twig_Environment($loader, array(
            'cache' => 'cache',
            'debug' => 'true'));
            
$template = $twig->loadTemplate('Login/index.twig.html');

echo $template->render(array());
?>