<!DOCTYPE html>
    <html lang='ca'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login administrador</title>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
        <div class='header'>
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
        </div>
    </body>
</html>
