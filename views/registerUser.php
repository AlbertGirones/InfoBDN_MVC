<?php
require_once ("./views/header.php"); 
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <a href='index.php?controller=Principal&action=showUserLogin'><p>Torna enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
    <h1>Login alumne</h1>
    <form action='index.php?controller=Principal&action=saveUserRegister' method='post' enctype='multipart/form-data'>
        <div><p></p><input type='text' name='DNI' id='DNI' placeholder='DNI' class='campoform'></div>
        <div><p><br></p><input type='text' name='nom_alum' id='nom_alum' placeholder='Nom' class='campoform'></div>
        <div><p><br></p><input type='text' name='cog_alum' id='cog_alum' placeholder='Cognom' class='campoform'></div>
        <div><p><br></p><input type='text' name='edat_alum' id='edat_alum' placeholder='Edat' class='campoform'></input></div>
        <div><p><br></p><input type='email' name='correo' id='correo' placeholder='Correu' class='campoform'></input></div>
        <div><p><br></p><input type='password' name='passwd' id=passwd' placeholder='Contrasenya' class='campoform'></input></div>
        <div><p><br></p><input accept=image/jpeg type='file' name='foto' id='foto'></input></div>
        <div><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></div>
    </form>
</div>";
require_once("./views/footer.php");