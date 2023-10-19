<?php
session_start();
?>
<?php
    require_once "autoload.php";

    if (isset($_GET['controller'])) {
        $nombreController = $_GET['controller'] . "Controller";
    } else {
        //Controlador per dedecte
        $nombreController = "PrincipalController";
    }
    if (class_exists($nombreController)) {
        $controlador = new $nombreController();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "index";
        }
        try{
            $controlador->$action();
        } catch (Exception $e){
            echo "Ha habido un error: ",  $e->getMessage(),"\n";
        }
        catch (Error $e){
            echo "Ha habido un error: ",  $e->getMessage(),"\n";
        }
       
    } else {
        echo "No existe el controlador";
    }
    ?> 