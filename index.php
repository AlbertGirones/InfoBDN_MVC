<?php
session_start();
?>
<!--Controlador frontal: fichero que se encarga de cargarlo absolutamente-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
    <title>InfoBDN</title>
</head>

<body>
    <script src="script.js"></script>
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
       
    } else {
        echo "No existe el controlador";
    }
    ?>
</body>

</html>