<?php
require_once ("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <a href='index.php?controller=Principal&action=index'><p>Torna enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
    <h1>Login</h1>
    <form action='index.php?controller=Principal&action=saveUserLogin' method='post'>
        <p><input type='text' name='dni' id='dni' placeholder='DNI' class='campoform'></input></p>
        <p><input type='password' name='passwd' id='passwd' placeholder='Contrasenya' class='campoform'></input></p>
        <p class='campoform'>Alumne<input type='radio' id='Alumnat' name='rango' value='alumnes' required></input></p>
        <p class='campoform'>Professor<input type='radio' id='Professorat' name='rango' value='professors'></input></p>
        <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
    </form>
</div>
<a href='index.php?controller=Principal&action=showUserRegister' id='registerlink'><p>Ets alumne? Registrat!</p></a>";
require_once("./views/footer.php");