<?php
class Conexion
{
    private $cn;
    private $rs;
    private $servidor;
    private $usuario;
    private $password;
    private $bd;

    public function __construct($servidor = "localhost", $usuario = "rchecnes_apu", $password = "raisa6242016apu", $bd = "rchecnes_sisci")
    {
        $this->servidor = $servidor;
        $this->usuario  = $usuario;
        $this->password = $password;
        $this->bd = $bd;
        $this->cn = new mysqli($this->servidor, $this->usuario, $this->password, $this->bd);
    }
    public function dbExecute($query)
    {
        $this->rs = $this->cn->query($query);
        return $this->rs;
    }
    public function getInsertedId()
    {
        return $this->cn->insert_id;
    }
    public function afectados()
    {
        return $this->cn->affected_rows;
    }
    protected function clean($value)
    {
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        $value = mysqli_real_escape_string(htmlspecialchars($value));
        return $value;
    }
    public function __destruct()
    {
        $this->cn;
    }
}
?>