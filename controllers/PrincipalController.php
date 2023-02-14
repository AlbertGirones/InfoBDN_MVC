<?php

require "models/professors.php";
require "models/alumne.php";

class PrincipalController
{
    public function index()
    {
        require_once "views/main.php";
    }

    public function showUserLogin()
    {
        require_once "views/loginUser.php";
    }

    public function saveUserLogin()
    {

        $dni = $_POST['dni'];
        $passwd = $_POST['passwd'];
        $passwd = md5($passwd);
        $rol = $_POST['rango'];

        if ($rol == 'alumnes') {
            $login = new Alumne();
            $result = $login->login($dni, $passwd);
            if($result){
                $datos = new Alumne();
                $informacion = $datos->obtenerDatosAlumneFoto($dni);
                foreach ($informacion as $dato){
                    $_SESSION['dni'] = $dni;
                    $_SESSION['nombre'] = $dato['nom_alum'];
                    $_SESSION['apellido'] = $dato['cog_alum'];
                    $_SESSION['foto'] = $dato['foto_alum'];
                }
                header("Location: index.php?controller=Cursos&action=showCursosDisponibles");
            }
            else{
                echo "login incorrecto (alumne)";
            }
        }
        else{
            $login = new Professor();
            $result = $login->login($dni, $passwd);
            if($result){
                $datos = new Professor();
                $informacion = $datos->obtenerDatosProfessorFoto($dni);
                foreach ($informacion as $dato){
                    $_SESSION['dni'] = $dni;
                    $_SESSION['nombre'] = $dato['nom_prof'];
                    $_SESSION['apellido'] = $dato['cog_prof'];
                    $_SESSION['foto'] = $dato['foto_prof'];
                }
                header("Location: index.php?controller=Professors&action=showElsMeusCursos");
            }
            else{
                echo "login incorrecto (profe)";
            }
        }

    }

    public function showUserRegister()
    {
        require_once "views/registerUser.php";
    }

    public function saveUserRegister()
    {
        $alumne = new Alumne();
        $DNIAlumne = $_POST['DNI'];
        $nomAlumne = $_POST['nom_alum'];
        $cognomAlumne = $_POST['cog_alum'];
        $edatAlumne = $_POST['edat_alum'];
        $correoAlumne = $_POST['correo'];
        $passwd = $_POST['passwd'];
        $md5passwd = md5($passwd);

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "img/alumimg/";
            $idUnico = $DNIAlumne;
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

        $alumne->anadir($DNIAlumne, $nomAlumne, $cognomAlumne, $edatAlumne, $correoAlumne, $md5passwd, $imagen);
        header("Location: index.php?controller=Principal&action=showUserLogin");
    }

    public function destroySesion()
    {
        session_destroy();
        header('Location: index.php?controller=Principal&action=index');
    }

}
?>