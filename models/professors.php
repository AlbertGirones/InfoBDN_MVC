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
}
