<?php

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
        $login = new Principal();
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];
        $rol = $_POST['rango'];

        $result = $login->loginUser($user, $passwd, $rol);
        if ($result) {
            $_SESSION['user'] = $user;
            $_SESSION['rol'] = $login->getRole($user)[0]['rol'];
            echo "login correcto";
            header('Location: index.php?controller=Principal&action=index');
            die();
        } else {
            echo "login incorrecto";
        }
    }

    public function showUserRegister()
    {
        require_once "views/registerUser.php";
    }

    public function saveUserRegister()
    {
        $login = new Principal();
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];

        $result = $login->login($user, $passwd);
        if ($result) {
            $_SESSION['user'] = $user;
            $_SESSION['rol'] = $login->getRole($user)[0]['rol'];
            echo "login correcto";
            header('Location: index.php?controller=Principal&action=index');
            die();
        } else {
            echo "login incorrecto";
        }
    }

    public function destroySesion()
    {
        session_destroy();
        header('Location: index.php?controller=Principal&action=index');
    }
}
?>