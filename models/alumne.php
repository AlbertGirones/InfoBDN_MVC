<?php
require_once("database.php");
class Alumne extends Database
{
    public function login($usuario, $passwd)
    {
        $consulta = $this->db->prepare("SELECT * FROM alumnes WHERE DNI LIKE '$usuario' AND passwd_alum LIKE '$passwd'");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerDatosAlumneFoto($idAlumne){
        $consulta = $this->db->prepare("SELECT DNI, nom_alum, cog_alum, foto_alum FROM alumnes WHERE DNI LIKE '$idAlumne'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function anadir(
        $dni,
        $nombre,
        $cognom,
        $edat,
        $correo,
        $md5passwd,
        $imagen
    )
    {
        $consulta = $this->db->prepare("INSERT INTO alumnes (DNI, nom_alum, cog_alum, edat_alum, foto_alum, correo_alum, passwd_alum) VALUES ('$dni', '$nombre', '$cognom', '$edat', '$imagen', '$correo', '$md5passwd')");
        $consulta->execute();
    }

}