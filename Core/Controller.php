<?php
class Controller{
    
    private $db;
    private $conectar;
    private $dbpdo;
    
    public function __construct() {

        require_once 'Conectar.php';
        $this->conectar= new Conectar();
        $this->db      = $this->conectar->conexion();
        //$this->dbpdo   = $this->conectar->startFluent();
    }

    public function db(){
        return $this->db;
    }

    public function dbpdo(){
        return $this->dbpdo;
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

        /*$base_url = '';
        $base_folder = strtolower(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

        if (isset($_SERVER['HTTP_HOST']))
        {
            $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $base_url .= '://'. $_SERVER['HTTP_HOST'];
            $base_url .= $base_folder;
<<<<<<< HEAD
        }*/

        header("Location: index.php?url=".$controller.'/'.$method);
        exit();
=======
        } 

        //header('Location:'.sprintf("Location: %s%s", $base_url, $controller.'/'.$method));
        header('Location:'.sprintf("Location: %s%s", $base_url, 'index.php'));exit();
    
        //echo sprintf("%s%s", $base_url, $controller.'/'.$method);
        /*if (headers_sent()) {

            echo "<script>document.location.href='/".$controller.'/'.$method."'</script>";
            //echo "Arriba:".$base_url.$controller.'/'.$method;
        }else{
            //echo "Llega";
            //echo "Abajo:".$base_url.$controller.'/'.$method;
            header("location: ".$controller.'/'.$method);
        }*/

        //exit();
>>>>>>> aab160d73134421b1e2c17a7d48481341f6f0c3f

    }
 
}
?>