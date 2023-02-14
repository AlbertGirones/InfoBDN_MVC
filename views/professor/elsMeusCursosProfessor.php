<?php
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <div id='minilog'>
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
    <h1>Els meus cursos</h1>
    <form action='index.php?controller=Professors&action=buscarElMeuCurs' method='post' name='filtre'>
        Necessites buscar algun curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>
        <button type='submit'>Buscar</button>
        <a href='index.php?controller=Professors&action=showElsMeusCursos'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>
    </form>
    <table id='table'>
        <tr>
            <th>Nom del curs</th>
            <th>Descripció</th>
            <th>Numero d'alumnes</th>
        </tr>";
        foreach ($listado as $curs){
            echo "<tr>
                <td>".$curs[1]."</td>
                <td>".$curs[2]."</td>
                <td><a href='index.php?controller=Professors&action=showAlumnesXCurs&id=" . $curs[0] . "'><img src='img/48/icons8-clipboard-48.svg' class='emoji'></a></td>
            </tr>";
        }
echo "</table>
</div>";