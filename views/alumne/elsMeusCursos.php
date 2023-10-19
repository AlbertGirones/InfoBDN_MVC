<?php
require_once ("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <div id='minilog'>
            <a href='index.php?controller=Cursos&action=showCursosDisponibles'>Cursos disponibles</a>
            <div class='grid'>
                <img src=".$_SESSION['foto']." id='fotominilog'>
                <p class='textgrid1'>".$_SESSION['nombre']."</p>
                <p class='textgrid2'>".$_SESSION['apellido']."</p>
            </div>
            <a href='index.php?controller=Principal&action=destroySesion'><img src='img/logout.svg' id='fotologout'></a>
        </div>
    </div>
</div>
<div class='cursosdisp'>
<h1>Els meus cursos</h1>
    <form action='index.php?controller=Cursos&action=buscarElMeuCurs' method='post' name='filtre'>
        Necessites buscar un curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>
        <button type='submit'>Buscar</button>
        <a href='index.php?controller=Cursos&action=showElsMeusCursos'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>
    </form>
    <div class='cursbox'>";
    foreach($listado as $curs){
        echo "<div class='curs'>
            <h1 id='titol'>".$curs[1]."</h1>
            <p id='desc'>Descripció: ".$curs[2]."</p>
            <p id='hores'>Hores totals: ".$curs[3]."</p>
            <p id='data'>Desmatriculació disponible fins: ".$curs[5]."</p>
            <p><a id='matricularme' href='index.php?controller=Cursos&action=donarBaixaCurs&id=" . $curs[0] . "'>Donar de baixa</a></p>
        </div>
        <br>";
    }
    echo "</div>
</div>";
require_once("./views/footer.php");