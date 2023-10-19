<?php
require_once ("./views/header.php");
if (isset($_SESSION["user"])){
    echo "<div class='header'>
        <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <a href='index.php?controller=Admin&action=showPrincipalPage'><p>Tornar al menú</p></a>
            <a href='index.php?controller=Principal&action=destroySesion'><p>Tancar sessió</p></a>
        </div>
    </div>
    <div id='adminhub'>
        <input type='file' id='archivoInput' />
    </div>
    <div id='data'></div>
    <div><button style='display: none;'id='botonInput'>Insertar a DB</button></div>";
}
else{
    echo "Has d'estar validat per accedir a la pagina!";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=$URL'>";
}
require_once("./views/footer.php");