<?php
require_once ("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <a href='index.php?controller=Professors&action=showAlumnesXCurs&id=$idCurso'><p>Ves enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
    <h1>Modificar nota</h1>
    <form action='index.php?controller=Professors&action=savePosarNota' method='post' enctype='multipart/form-data'>
        <p><input type='text' name='DNI' id='DNI' value='$dniAlumne' class='campoform' readonly></p>
        <p><br><input type='text' name='idcurs' id='idcurs' value='$idCurso' class='campoform' readonly></p>
        <p><br><input type='number' name='nota' id='nota' value='$nota' class='campoform'></p>
        <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
    </form>
</div>";
require_once("./views/footer.php");
?>