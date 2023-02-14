<?php

require "models/cursos.php";
require "models/professors.php";

class CursosController
{
    public function showCursos()
    {
        $curs = new Curs();
        $listado = $curs->obtenerListado();
        require_once "views/admin/curs/cursosAdmin.php";
    }

    public function showFormNewCurs()
    {
        $professor = new Professor();
        $listado = $professor->obtenerListadoSimplificado();
        require_once "views/admin/curs/formCurs.php";
    }

    public function saveFormCurs()
    {
        $curs = new Curs();

        $nom_curs = $_POST['nom_curs'];
        $desc_curs = $_POST['desc_curs'];
        $hores_curs = $_POST['hores_curs'];
        $ini_curs = $_POST['ini_curs'];
        $fin_curs = $_POST['fin_curs'];
        $DNI_prof = $_POST['DNI_prof'];

        $curs->anadir($nom_curs, $desc_curs, $hores_curs, $ini_curs, $fin_curs, $DNI_prof);
        header("Location: index.php?controller=Cursos&action=showCursos");
    }

    public function showFormEditCurs()
    {
        $curs = new Curs();
        $professor = new Professor();
        $idCurs = $_GET['id'];
        $listado = $curs->obtenerCurs($idCurs);
        $professores = $professor->obtenerListadoSimplificado();
        require_once "views/admin/curs/formEditarCurs.php";
    }

    public function saveFormEditCurs()
    {
        $curs = new Curs();
        $id = $_POST['id'];
        $nomCurs = $_POST['nom_curs'];
        $descripcioCurs = $_POST['desc_curs'];
        $horesCurs = $_POST['hores_curs'];
        $dataInici = $_POST['ini_curs'];
        $dataFinal = $_POST['fin_curs'];
        $professor = $_POST['DNI_prof'];
        $curs->editar($id, $nomCurs, $descripcioCurs, $horesCurs, $dataInici, $dataFinal, $professor);
        header("Location: index.php?controller=Cursos&action=showCursos");
    }

    public function activarCurs()
    {
        $idCurs = $_GET['id'];
        $curs = new Curs();
        $curs->activar($idCurs);
        header("Location: index.php?controller=Cursos&action=showCursos");
    }

    public function desactivarCurs()
    {
        $idCurs = $_GET['id'];
        $curs = new Curs();
        $curs->desactivar($idCurs);
        header("Location: index.php?controller=Cursos&action=showCursos");
    }

    public function buscarCurs()
    {
        $filtro = $_POST['filtre'];
        $buscador = new Curs();
        $listado = $buscador->filtrarCursos($filtro);
        require_once "views/admin/curs/cursosAdmin.php";
    }

}