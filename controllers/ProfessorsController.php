<?php

require "models/professors.php";

class ProfessorsController
{
    public function showProfessors() {
        $professor = new Professor();
        $listado = $professor->obtenerListado();
        require_once "views/admin/professorsAdmin.php";
    }
}