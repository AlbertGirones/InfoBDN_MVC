<?php
require_once("database.php");
class Professor extends Database
{
    public function obtenerListado() {
        $consulta = $this->db->prepare("SELECT DNI, nom_prof, cog_prof, titol_prof, foto_prof, visible FROM professors");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerProfessor($idProfessor) {
        $consulta = $this->db->prepare("SELECT DNI, nom_prof, cog_prof, titol_prof FROM professors WHERE DNI LIKE '$idProfessor'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerDatosProfessor($idProfessor) {
        $consulta = $this->db->prepare("SELECT DNI, nom_prof, cog_prof FROM professors WHERE DNI LIKE '$idProfessor'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function activar($id){
        $consulta = $this->db->prepare("UPDATE professors SET visible = 1 WHERE DNI LIKE '$id'");
        $consulta->execute();
    }
    public function desactivar($id){
        $consulta = $this->db->prepare("UPDATE professors SET visible = 0 WHERE DNI LIKE '$id'");
        $consulta->execute();
    }
    public function anadir(
        $dni,
        $nombre,
        $cognom,
        $titol,
        $imagen,
        $md5passwd
    )
    {
        $consulta = $this->db->prepare("INSERT INTO professors (DNI, nom_prof, cog_prof, titol_prof, foto_prof, visible, passwd_prof) VALUES ('$dni', '$nombre', '$cognom', '$titol', '$imagen', 1, '$md5passwd')");
        $consulta->execute();
    }

    public function editar(
        $dni,
        $nombre,
        $cognom,
        $titol
    )
    {
        $consulta = $this->db->prepare("UPDATE professors SET nom_prof= '$nombre', cog_prof= '$cognom', titol_prof= '$titol' WHERE DNI = '$dni'");
        $consulta->execute();
    }

    public function editarFoto(
        $dni,
        $imagen
    )
    {
        $consulta = $this->db->prepare("UPDATE professors SET foto_prof= '$imagen' WHERE DNI = '$dni'");
        $consulta->execute();
    }

    public function filtrarProfessors($filtro) {
        $consulta = $this->db->prepare("SELECT DNI, nom_prof, cog_prof, titol_prof, foto_prof, visible FROM professors WHERE nom_prof LIKE '%$filtro%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}