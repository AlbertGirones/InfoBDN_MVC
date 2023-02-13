<?php
echo "
<!DOCTYPE html>
<html lang='ca'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Menu administrador: Cursos</title>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
        <div class='header'>
        <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
                <a href='index.php?controller=Cursos&action=showFormNewCurs'><p>Afegir curs</p></a>
                <a href='index.php?controller=Admin&action=showPrincipalPage'><p>Tornar al menú</p></a>
                <a href='index.php?controller=Principal&action=destroySesion'><p>Tancar sessió</p></a>
            </div>
        </div>
        <div id='administracion'>
            <h1>Gestió cursos</h1>
            <form action='index.php?controller=Cursos&action=buscarCurs' method='post' name='filtre'>
                Necessites buscar algun curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>
                <button type='submit'>Buscar</button>
                <a href='index.php?controller=Cursos&action=showCursos'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>
            </form>
            <table id='table'>
                <tr>
                    <th>Codi</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Hores</th>
                    <th>Data inici</th>
                    <th>Data final</th>
                    <th>DNI Professor</th>
                    <th>Editar curs</th>
                    <th>Visibilitat</th>
                    <th>Modificar visibilitat</th>
                </tr>";
            foreach ($listado as $curs){
                echo "<tr>
                    <td>".$curs[0]."</td>
                    <td>".$curs[1]."</td>
                    <td>".$curs[2]."</td>
                    <td>".$curs[3]."</td>
                    <td>".$curs[4]."</td>
                    <td>".$curs[5]."</td>
                    <td>".$curs[6]."</td>
                    <td><a href='index.php?controller=Cursos&action=showFormEditCurs&id=" . $curs[0] . "'><img src='img/48/icons8-pencil-48.png' class='emoji'></a></td>";
                    if($curs[7]=='1'){
                        echo "<td>Actiu</td>
                        <td><a href='index.php?controller=Cursos&action=desactivarCurs&id=" . $curs[0] . "'><img src='img/48/icons8-check-mark-48.png'src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
                    }else {
                        echo "<td class='noactiu'>No actiu</td>
                        <td><a href='index.php?controller=Cursos&action=activarCurs&id=" . $curs[0] . "'><img src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
                    }
                echo "</tr>";
            }
            echo "</table>
        </div>
    </body>
</html>";