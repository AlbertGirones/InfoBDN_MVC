<?php
require_once("database.php");
class Matricula extends Database
{
    public function inscripcioON(
        $dni,
        $id
    )
    {
        $consulta = $this->db->prepare("INSERT INTO matricula VALUES ('$dni', '$id', 0)");
        $consulta->execute();
    }

    public function inscripcioOFF(
        $dni,
        $id
    )
    {
        $consulta = $this->db->prepare("DELETE FROM matricula WHERE DNI_alum = '$dni' AND curso = '$id' ");
        $consulta->execute();
    }

    public function insertRegistrationForFile($dni,$register)
    {
        $consulta = $this->db->prepare("INSERT INTO matricula VALUES ('$dni', '$register', 0)");
        $consulta->execute();
    }

}
