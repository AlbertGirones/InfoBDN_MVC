<?php

class PrincipalController
{
    public function index()
    {
        require_once "views/main.php";
    }

//    public function MostrarLogin()
//    {
//        $categoria = new Principal();
//        require_once "views/general/formulario.php";
//    }
//
//    public function loginUser()
//    {
//        $login = new Principal();
//        $user = $_POST['user'];
//        $passwd = $_POST['passwd'];
//
//        $result = $login->login($user, $passwd);
//        if ($result) {
//            $_SESSION['user'] = $user;
//            $_SESSION['rol'] = $login->getRole($user)[0]['rol'];
//            echo "login correcto";
//            header('Location: index.php?controller=Principal&action=index');
//            die();
//        } else {
//            echo "login incorrecto";
//        }
//    }
//
//    public function mostrarGeneral()
//    {
//        $categoria = new Principal();
//        $resultado = $categoria->obtenerListado();
//        require_once "views/general/menu.php";
//        // $libros = new Libro();
//        // $resultado = $libros->librosGeneral();
//
//    }

    public function destroySesion()
    {
        session_destroy();
        header('Location: index.php?controller=Principal&action=index');
    }
}
?>