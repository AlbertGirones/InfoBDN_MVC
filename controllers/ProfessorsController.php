<?php

require "models/professors.php";

class ProfessorsController
{
    public function showProfessors()
    {
        $professor = new Professor();
        $listado = $professor->obtenerListado();
        require_once "views/admin/professor/professorsAdmin.php";
    }

    public function showFormNewProfessor()
    {
        require_once "views/admin/professor/formProfessor.php";
    }

    public function saveFormProfessor()
    {
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

    public function showFormEditProfessor()
    {
        $professor = new Professor();
        $idProfessor = $_GET['id'];
        $listado = $professor->obtenerProfessor($idProfessor);
        require_once "views/admin/professor/formEditarProfessor.php";
    }

    public function saveFormEditProfessor()
    {
        $professor = new Professor();
        $dni = $_POST['DNI'];
        $nomProfessor = $_POST['nom_prof'];
        $cognomProfessor = $_POST['cog_prof'];
        $titolProfessor = $_POST['titol_prof'];
        $professor->editar($dni, $nomProfessor, $cognomProfessor, $titolProfessor);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function showFormFotoProfessor()
    {
        $professor = new Professor();
        $idProfessor = $_GET['id'];
        $listado = $professor->obtenerDatosProfessor($idProfessor);
        require_once "views/admin/professor/modificarFotoProfessor.php";
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
        $idProfessor = $_GET['id'];
        $professor = new Professor();
        $professor->activar($idProfessor);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function desactivarProfessor()
    {
        $idProfessor = $_GET['id'];
        $professor = new Professor();
        $professor->desactivar($idProfessor);
        header("Location: index.php?controller=Professors&action=showProfessors");
    }

    public function buscarProfessor()
    {
        $filtro = $_POST['filtre'];
        $buscador = new Professor();
        $listado = $buscador->filtrarProfessors($filtro);
        require_once "views/admin/professor/professorsAdmin.php";
    }
}