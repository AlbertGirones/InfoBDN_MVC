<?php
require_once ("./views/header.php");
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
        <div><a href='index.php?controller=Admin&action=showAdminStudents'>Gestió alumnes</a></div>
    </div>";
}
else{
    echo "Has d'estar validat per accedir a la pagina!";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}
require_once("./views/footer.php");