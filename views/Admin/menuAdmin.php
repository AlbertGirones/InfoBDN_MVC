<?php
echo "<!DOCTYPE html>
<html lang='ca'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Menu administrador</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>";
    if (isset($_SESSION["user"])){
        echo "<div class='header'>
            <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
                <a href='index.php?controller=Principal&action=destroySesion'><p>Tancar sessió</p></a>
            </div>
        </div>
        <div id='adminhub'>
            <div><a href='index.php?controller=Professors&action=showProfessors'>Gestió professors</a></div>
            <div><a href='index.php?controller=Cursos&action=showCursos'>Gestió cursos</a></div>
        </div>";
    }
    else{
        echo "Has d'estar validat per accedir a la pagina!";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
    }
echo "</body>
</html>";