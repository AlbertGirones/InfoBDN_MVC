<?php
require_once "models/admin.php";

class AdminController
{
    public function showAdminLogin()
    {
        require_once "views/Admin/loginAdmin.php";
    }

    public function saveAdminLogin()
    {
        $login = new Admin();
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];
        $passwd = md5($passwd);

        $result = $login->login($user, $passwd);

        if ($result) {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = 'admin';
            header('Location: index.php?controller=Admin&action=showPrincipalPage');
        } else {
            require_once "views/loginIncorrecte.php";
        }
    }
    
    public function showPrincipalPage(){
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/Admin/menuAdmin.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function showAdminStudents(){
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){
            require_once "views/Admin/menuAdminStudents.php";
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }
}