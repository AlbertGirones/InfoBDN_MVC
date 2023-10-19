<?php

require_once "models/admin.php";
require_once "models/alumne.php";
require "models/matricula.php";
require "models/cursos.php";

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
            $data = json_decode(file_get_contents('php://input'), true);
            if (isset($data['cadena'])) {
                $cadenaRecibida = $data['cadena'];
                require_once "views/Admin/menuAdminListStudents.php";
            } 
            else {
                require_once "views/Admin/menuAdminStudents.php";
            }
        
        }
        else {
            require_once "views/loginIncorrecte.php";
        }
    }

    public function sendStudentsToDB(){
        if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin'){

            $data = json_decode(file_get_contents('php://input'), true);
            $student = new Alumne();
            $registration = new Matricula();
            $book = new Curs();
            $string = $data['cadena'];
            $result = false;

            for ($i=0; $i < count($string); $i++) {

                $dni = $string[$i][0];
                $result = $student->checkID($dni);
                
                if ($result == false) {

                    $name = $string[$i][1];
                    $surname = $string[$i][2];
                    $year = $string[$i][3];

                    $student->insertStudentForFile($dni,$name,$surname,$year);

                    for ($n=0; $n < count($string[$i][5]); $n++) {
                        $register = $string[$i][5][$n];
                        $result = $book->checkBook($register);
                        if ($result === true) {
                            $registration->insertRegistrationForFile($dni,$register);
                        }
                    }
                }
            }    
        }
        else{
            require_once "views/Admin/menuAdminStudents.php";
        }
    }
}