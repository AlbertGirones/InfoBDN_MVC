<?php
echo "
<!DOCTYPE html>
<html lang='ca'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Menu administrador: Professors</title>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
        <div class='header'>
            <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
            <a href='index.php?controller=Professors&action=showProfessors'><p>Ves enrere ...</p></a>
            </div>
        </div>
        <div id='adminlog'>
            <h1>Afegir professor</h1>
            <form action='formprofe.php' method='post' enctype='multipart/form-data'>
                <div><p></p><input type='text' name='DNI' id='DNI' placeholder='DNI' class='campoform'></div>
                <div><p><br></p><input type='text' name='nom_prof' id='nom_prof' placeholder='Nom' class='campoform'></div>
                <div><p><br></p><input type='text' name='cog_prof' id='cog_prof' placeholder='Cognom' class='campoform'></div>
                <div><p><br></p><input type='text' name='titol_prof' id='titol_prof' placeholder='Titol' class='campoform'></input></div>
                <div><p><br>Foto:</p><input accept=image/jpeg type='file' name='foto' id='foto' ></input></div>
                <div><p><br>Activat <input type='radio' id='activat' name='onoff' value='1' required></input> Descativat <input type='radio' id='noactivat' name='onoff' value='0'></input></p></div>
                <div><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></div>
            </form>
        </div>
    </body>
</html>";