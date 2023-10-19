<?php
require_once ("./views/header.php");
echo "<div class='header'>
<img src='img/logo.svg' alt='Logo'>
<div class='navmenu'>
    <a href='index.php?controller=Principal&action=index'><p>Torna enrere ...</p></a>
</div>
</div>
<div id='adminlog'>
<h1>Admin Login</h1>
<form action='index.php?controller=Admin&action=saveAdminLogin' method='post'>
    <p><input type='text' name='user' id='user' placeholder='Usuari' class='campoform'></input></p>
    <p><input type='password' name='passwd' id='passwd' placeholder='Contrasenya' class='campoform'></input></p>
    <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
</form>
</div>";
require_once("./views/footer.php");