<?php
require_once("database.php");
class Curs extends Database
{
    public function obtenerListado() {
        $consulta = $this->db->prepare("SELECT * FROM cursos");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerCurs($idCurs) {
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE codi_curs LIKE '$idCurs'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function activar($id){
        $consulta = $this->db->prepare("UPDATE cursos SET visible = 1 WHERE codi_curs LIKE '$id'");
        $consulta->execute();
    }

    public function desactivar($id){
        $consulta = $this->db->prepare("UPDATE cursos SET visible = 0 WHERE codi_curs LIKE '$id'");
        $consulta->execute();
    }

    public function anadir(
        $nom,
        $descripcio,
        $hores,
        $iniciCurs,
        $finalCurs,
        $dniProfessor
    )
    {
        $consulta = $this->db->prepare("INSERT INTO cursos VALUES ('', '$nom', '$descripcio', '$hores', '$iniciCurs', '$finalCurs', '$dniProfessor', 1)");
        $consulta->execute();
    }

    public function editar(
        $id,
        $nom,
        $descripcio,
        $hores,
        $dataInici,
        $dataFinal,
        $professor
    )
    {
        $consulta = $this->db->prepare("UPDATE cursos SET nom_curs= '$nom', desc_curs= '$descripcio', hores_curs= '$hores', ini_curs= '$dataInici', fin_curs = '$dataFinal', DNI_prof = '$professor' WHERE codi_curs = '$id'");
        $consulta->execute();
    }

    public function filtrarCursos($filtro) {
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE nom_curs LIKE '%$filtro%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}