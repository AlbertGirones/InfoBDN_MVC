<?php
require_once("database.php");
class Admin extends Database
{
    public function login($usuario, $passwd)
    {
        $consulta = $this->db->prepare("SELECT * FROM admin WHERE user LIKE '$usuario' AND passwd LIKE '$passwd'");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }
}
