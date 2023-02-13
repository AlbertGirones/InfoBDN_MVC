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
            header('Location: index.php?controller=Admin&action=showPrincipalPage');
        } else {
            echo "nanananna";
        }
    }

    public function showPrincipalPage() {
        require_once "views/Admin/menuAdmin.php";
    }
}