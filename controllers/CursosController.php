<?php

require "models/alumne.php";
require "models/cursos.php";
require "models/professors.php";
require "models/matricula.php";

class CursosController
{
    public function showCursos()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $curs = new Curs();
            $listado = $curs->obtenerListado();
            require_once "views/admin/curs/cursosAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showFormNewCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $listado = $professor->obtenerListadoSimplificado();
            require_once "views/admin/curs/formCurs.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function saveFormCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
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
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showFormEditCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $curs = new Curs();
            $professor = new Professor();
            $idCurs = $_GET['id'];
            $listado = $curs->obtenerCurs($idCurs);
            $professores = $professor->obtenerListadoSimplificado();
            require_once "views/admin/curs/formEditarCurs.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function saveFormEditCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
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
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function activarCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $idCurs = $_GET['id'];
            $curs = new Curs();
            $curs->activar($idCurs);
            header("Location: index.php?controller=Cursos&action=showCursos");
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function desactivarCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $idCurs = $_GET['id'];
            $curs = new Curs();
            $curs->desactivar($idCurs);
            header("Location: index.php?controller=Cursos&action=showCursos");
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function buscarCurs()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $filtro = $_POST['filtre'];
            $buscador = new Curs();
            $listado = $buscador->filtrarCursos($filtro);
            require_once "views/admin/curs/cursosAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showCursosDisponibles(){
        $user = $_SESSION["dni"];
        $infoLogin = new Alumne();
        $infoAlumne = $infoLogin->obtenerLoginAlumne($user);
        $loginAlumne = $infoAlumne[0][7] == NULL ? $loginAlumne = 0 : $loginAlumne = 1;
        $curs = new Curs();
        $date = date ( 'Y-m-d' );
        $listado = $curs->comprobarFechaCurso($date, $user);
        require_once "views/alumne/cursosDisponibles.php";
    }

    public function buscarCursDisponible(){
        $filtro = $_POST['filtre'];
        $date = date ( 'Y-m-d' );
        $user = $_SESSION["dni"];
        $buscador = new Curs();
        $listado = $buscador->filtrarCursosDisponibles($filtro, $date, $user);
        require_once "views/alumne/cursosDisponibles.php";
    }

    public function inscripcioCurs() {
        $matricula = new Matricula();
        $id = $_GET["id"];
        $dni = $_SESSION["dni"];
        $matricula->inscripcioON($dni, $id);
        header("Location: index.php?controller=Cursos&action=showCursosDisponibles");
    }

    public function showElsMeusCursos(){
        $curs = new Curs();
        $dni = $_SESSION["dni"];
        $listado = $curs->obtenirElsMeusCursos($dni);
        require_once "views/alumne/elsMeusCursos.php";
    }

    public function donarBaixaCurs() {
        $matricula = new Matricula();
        $id = $_GET["id"];
        $dni = $_SESSION["dni"];
        $matricula->inscripcioOFF($dni, $id);
        header("Location: index.php?controller=Cursos&action=showElsMeusCursos");
    }

    public function buscarElMeuCurs(){
        $filtro = $_POST['filtre'];
        $dni = $_SESSION["dni"];
        $buscador = new Curs();
        $listado = $buscador->filtrarElsMeusCursos($filtro, $dni);
        require_once "views/alumne/elsMeusCursos.php";
    }
}