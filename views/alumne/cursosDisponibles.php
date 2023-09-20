<?php
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
        <div id='minilog'>
            <a href='index.php?controller=Cursos&action=showElsMeusCursos'>Els meus cursos</a>
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
    <h1>Cursos disponibles</h1>
    <form action='index.php?controller=Cursos&action=buscarCursDisponible' method='post' name='filtre'>
        Necessites buscar un curs?<input type='text' id='filtre' name='filtre' placeholder='Buscar'/>
        <button type='submit'>Buscar</button>
        <a href='index.php?controller=Cursos&action=showCursosDisponibles'><img src='img/48/icons8-cross-mark-48.png' id='cancelar''></a>
    </form>
    <div class='cursbox'>";
        foreach ($listado as $curs) {
            echo "<div class='curs'>
                <h1 id='titol'>".$curs[1]."</h1>
                <p id='desc'>Descripció: ".$curs[2]."</p>
                <p id='hores'>Hores totals: ".$curs[3]."</p>
                <p id='data'>Inscripció disponible fins: ".$curs[5]."</p>
                <p><a id='matricularme' href='index.php?controller=Cursos&action=inscripcioCurs&id=" . $curs[0] . "'>Matricular-me</a></p>
            </div>
            <br>";
        }
    echo "</div>
</div>";
if ($loginAlumne == 0) {
    echo "<script>
        obrirFinestraConcurs();
    </script>";
}