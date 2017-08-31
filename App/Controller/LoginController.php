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
       
        $usuario = $_POST['usuario'];
        $password = md5($_POST['password']);
                
        $sql = $this->db()->query("SELECT * FROM usuario WHERE usuario='$usuario' AND salt='$password'");
        
        if($row = $sql->fetch_object()) {

          if ($row->activo == 1) {

            if (!session_start()) { session_start();}

            $usuario_id = $row->id;
            $persona_id = $row->persona_id;
            $rol_id = $row->id;
            //Persona
            $sql_p = $this->db()->query("SELECT * FROM persona WHERE id='$persona_id'");
            $row_p = $sql_p->fetch_object();
            $sql_r = $this->db()->query("SELECT * FROM rol WHERE id='$rol_id'");
            $row_r = $sql_r->fetch_object();

            //Actualizamos el ultimo acceso
            $fecha = date('Y-m-d h:i:s');
            $this->db()->query("UPDATE usuario SET ultimo_acceso='$fecha' WHERE id='$usuario_id'");

            //Creamos session
            $_SESSION['rol_id'] = $row->rol_id;
            $_SESSION['rol_nombre'] = $row_r->nombre;
            $_SESSION['rol_nombre_sis'] = $row_r->nombre_sis;
            $_SESSION['usuario_id'] = $row->id;
            $_SESSION['anio'] = $row->anio;
            $_SESSION['persona_id'] = $row->persona_id;
            $_SESSION['nombre'] = $row_p->nombre;
            $_SESSION['nombre_completo'] = $row_p->apellido_paterno.' '.$row_p->apellido_materno.' '.$row_p->nombre;

            $this->redirect('Home','index');

          }                   

        }else{

            $this->redirect('Login','index');
        }  
    }    
}
?>