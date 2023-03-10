<?php

require "models/professors.php";
require "models/cursos.php";
require "models/alumne.php";

class ProfessorsController
{
    public function showProfessors()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $listado = $professor->obtenerListado();
            require_once "views/admin/professor/professorsAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showFormNewProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/admin/professor/formProfessor.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function saveFormProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $dni = trim($_POST['DNI']);
            $nomProfessor = trim($_POST['nom_prof']);
            $cognomProfessor = $_POST['cog_prof'];
            $titolProfessor = $_POST['titol_prof'];
            $passwd = 123;
            $md5passwd = md5($passwd);

            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $nombreDirectorio = "img/profesimg/";
                $idUnico = $dni;
                $nombreOrigen = $_FILES['foto']['name'];
                $contenido = explode(".", $nombreOrigen);
                $extension = $contenido[1];
                $nombreFichero = $idUnico . "." . $extension;
                move_uploaded_file(
                    $_FILES['foto']['tmp_name'],
                    $nombreDirectorio . $nombreFichero
                );
            }
            $imagen = $nombreDirectorio . $nombreFichero;
            $professor->anadir($dni, $nomProfessor, $cognomProfessor, $titolProfessor, $imagen, $md5passwd);
            header("Location: index.php?controller=Professors&action=showProfessors");
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showFormEditProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $idProfessor = $_GET['id'];
            $listado = $professor->obtenerProfessor($idProfessor);
            require_once "views/admin/professor/formEditarProfessor.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function saveFormEditProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $dni = $_POST['DNI'];
            $nomProfessor = $_POST['nom_prof'];
            $cognomProfessor = $_POST['cog_prof'];
            $titolProfessor = $_POST['titol_prof'];
            $professor->editar($dni, $nomProfessor, $cognomProfessor, $titolProfessor);
            header("Location: index.php?controller=Professors&action=showProfessors");
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showFormFotoProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            $professor = new Professor();
            $idProfessor = $_GET['id'];
            $listado = $professor->obtenerDatosProfessor($idProfessor);
            require_once "views/admin/professor/modificarFotoProfessor.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function saveFormFotoProfessor()
    {
        $professor = new Professor();

        $dni = trim($_POST['DNI']);

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "img/profesimg/";
            $idUnico = $dni;
            $nombreOrigen = $_FILES['foto']['name'];
            $contenido = explode(".", $nombreOrigen);
            $extension = $contenido[1];
            $nombreFichero = $idUnico . "." . $extension;
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $nombreDirectorio . $nombreFichero
            );
        }
        $imagen = $nombreDirectorio . $nombreFichero;
        $professor->editarFoto($dni, $imagen);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function activarProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/Admin/menuAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
        $idProfessor = $_GET['id'];
        $professor = new Professor();
        $professor->activar($idProfessor);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function desactivarProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/Admin/menuAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
        $idProfessor = $_GET['id'];
        $professor = new Professor();
        $professor->desactivar($idProfessor);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function buscarProfessor()
    {
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/Admin/menuAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
        $filtro = $_POST['filtre'];
        $buscador = new Professor();
        $listado = $buscador->filtrarProfessors($filtro);
        require_once "views/admin/professor/professorsAdmin.php";
    }

    public function showElsMeusCursos(){
        $cursos = new Curs();
        $dni = $_SESSION["dni"];
        $listado = $cursos->obtenerListadoProfessor($dni);
        require_once "views/professor/elsMeusCursosProfessor.php";
    }

    public function buscarElMeuCurs(){
        $filtro = $_POST['filtre'];
        $dni = $_SESSION["dni"];
        $buscador = new Curs();
        $listado = $buscador->filtrarElsMeusCursosProfessor($filtro, $dni);
        require_once "views/professor/elsMeusCursosProfessor.php";
    }

    public function showAlumnesXCurs(){
        $alumnes = new Alumne();
        $idCurso = $_GET['id'];
        $listado = $alumnes->obtenerListadoAlumnos($idCurso);
        require_once "views/professor/alumnesXCurs.php";
    }

    public function showPosarNota(){
        $alumnes = new Alumne();
        $dniAlumne = $_GET['DNI_alum'];
        $idCurso = $_GET['idcurs'];
        $nota = $_GET['nota'];
        require_once "views/professor/formNota.php";
    }

    public function savePosarNota(){
        $alumnes = new Alumne();
        $dniAlumne = $_POST['DNI'];
        $idCurso = $_POST['idcurs'];
        $nota = $_POST['nota'];
        $alumnes->editar($dniAlumne, $idCurso, $nota);
        header("Location: index.php?controller=Professors&action=showAlumnesXCurs&id=$idCurso");
    }

}