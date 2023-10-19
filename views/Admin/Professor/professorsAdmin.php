<?php
require_once("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
        <div class='navmenu'>
            <a href='index.php?controller=Professors&action=showFormNewProfessor'><p>Afegir professor</p></a>
            <a href='index.php?controller=Admin&action=showPrincipalPage'><p>Tornar al menú</p></a>
            <a href='index.php?controller=Principal&action=destroySesion'><p>Tancar sessió</p></a>
        </div>
    </div>
    <div id='administracion'>
        <h1>Gestió professors</h1>
        <form action='index.php?controller=Professors&action=buscarProfessor' method='post' name='filtre'>
            Necessites buscar algun professor?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>
            <button type='submit'>Buscar</button>
            <a href='index.php?controller=Professors&action=showProfessors'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>
        </form>
        <table id='table'>
            <tr>
                <th>DNI</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>Titol</th>
                <th>Foto</th>
                <th>Editar dades</th>
                <th>Editar foto</th>
                <th>Visibilitat</th>
                <th>Modificar visibilitat</th>
            </tr>";
        foreach ($listado as $teacher){
            echo "<tr>
                <td>".$teacher[0]."</td>
                <td>".$teacher[1]."</td>
                <td>".$teacher[2]."</td>
                <td>".$teacher[3]."</td>
                <td><img class='fotoprof' src='$teacher[4]'></td>
                <td><a href='index.php?controller=Professors&action=showFormEditProfessor&id=" . $teacher[0] . "'><img src='img/48/icons8-pencil-48.png' class='emoji'></a></td>
                <td><a href='index.php?controller=Professors&action=showFormFotoProfessor&id=" . $teacher[0] . "'><img src='img/48/icons8-camera-with-flash-48.png' class='emoji'></a></td>";
                if($teacher[5]=='1'){
                    echo "<td>Actiu</td>
                    <td><a href='index.php?controller=Professors&action=desactivarProfessor&id=" . $teacher[0] . "'><img src='img/48/icons8-check-mark-48.png'src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
                }else {
                    echo "<td class='noactiu'>No actiu</td>
                    <td><a href='index.php?controller=Professors&action=activarProfessor&id=" . $teacher[0] . "'><img src='img/48/icons8-cross-mark-48.png' class='emoji'></a></td>";
                }
            echo "</tr>";
        }
        echo "</table>
    </div>";
require_once("./views/footer.php");
