<?php
require_once("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
    <a href='index.php?controller=Professors&action=showProfessors'><p>Ves enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
    <h1>Modificar foto</h1>
    <form action='index.php?controller=Professors&action=saveFormFotoProfessor' method='post' enctype='multipart/form-data'>";
        foreach ($listado as $professor) {
            echo "<p><input type='text' name='DNI' id='DNI' value='$professor[DNI]' class='campoform' readonly></p>
            <p><br><input type='text' name='nom_prof' id='nom_prof' value='$professor[nom_prof]' class='campoform' readonly></p>
            <p><br><input type='text' name='cog_prof' id='cog_prof' value='$professor[cog_prof]' class='campoform' readonly></p>
            <p><br><input type='file' accept='img/jpg' name='foto' id='foto'></p>
            <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
        }
    echo "</form>
</div>";
require_once("./views/footer.php");