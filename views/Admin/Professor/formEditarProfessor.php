<?php
require_once("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
    <a href='index.php?controller=Professors&action=showProfessors'><p>Ves enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
    <h1>Modificar professor</h1>
    <form action='index.php?controller=Professors&action=saveFormEditProfessor' method='post' enctype='multipart/form-data'>";
        foreach ($listado as $professor) {
            echo "<p><input type='text' name='DNI' id='DNI' value='$professor[0]' class='campoform' readonly></p>
            <p><br><input type='text' name='nom_prof' id='nom_prof' value='$professor[1]' class='campoform'></p>
            <p><br><input type='text' name='cog_prof' id='cog_prof' value='$professor[2]' class='campoform'></p>
            <p><br><input type='text' name='titol_prof' id='titol_prof' value='$professor[3]' class='campoform'></input></p>
            <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>";
        }
    echo "</form>
</div>";
require_once("./views/footer.php");