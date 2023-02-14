<?php
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <div id='minilog'>
            <a href='index.php?controller=Professors&action=showElsMeusCursos'><p>Els meus cursos</p></a>
            <div class='grid'>
                <img src=".$_SESSION['foto']." id='fotominilog'>
                <p class='textgrid1'>".$_SESSION['nombre']."</p>
                <p class='textgrid2'>".$_SESSION['apellido']."</p>
            </div>
            <a href='index.php?controller=Principal&action=destroySesion'><img src='img/logout.svg' id='fotologout'></a>
        </div>
    </div>
</div>


<div id='administracion'>
    <h1>Llistat d'alumnes</h1>
    <table id='table'>
        <tr>
            <th>DNI</th>
            <th>Nom</th>
            <th>Cognom</th>
            <th>Foto</th>
            <th>Nota</th>
            <th>Modificar nota</th>
        </tr>";
    foreach ($listado as $alumne){
        echo "<tr>
        <td>".$alumne[0]."</td>
        <td>".$alumne[1]."</td>
        <td>".$alumne[2]."</td>
        <td><img class='fotoprof' src='$alumne[4]'></td>
        <td>".$alumne[9]."</td>
        <td><a href='index.php?controller=Professors&action=showPosarNota&DNI_alum=$alumne[7]&idcurs=$alumne[8]&nota=$alumne[9]'><img src='img/48/icons8-pencil-48.png' class='emoji'></a></td>
        </tr>";
    }
    echo "</table>
</div>";