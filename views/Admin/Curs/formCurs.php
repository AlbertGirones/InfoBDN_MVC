<?php
require_once("./views/header.php");
echo "<div class='header'>
    <img src='img/logo.svg' alt='Logo'>
    <div class='navmenu'>
    <a href='index.php?controller=Cursos&action=showCursos'><p>Ves enrere ...</p></a>
    </div>
</div>
<div id='adminlog'>
<h1>Afegir curs</h1>
<form action='index.php?controller=Cursos&action=saveFormCurs' method='post'>
    <p><input type='text' name='nom_curs' id='nom_curs' placeholder='Nom curs' class='campoform'></p>
    <p><br><input type='text' name='desc_curs' id='desc_curs' placeholder='Descripció del curs' class='campoform'></p>
    <p><br><input type='number' name='hores_curs' id='hores_curs' placeholder='Hores totals' class='campoform'></p>
    <p><br><input type='date' name='ini_curs' id='ini_curs' class='campoform'></input></p>
    <p><br><input type='date' name='fin_curs' id='fin_curs' class='campoform'></input></p>
    <p><br><select name='DNI_prof' id='DNI_prof'>";
        foreach ($listado as $professor) {
            ?>
            <option value='<?php echo $professor["DNI"] ?>'><?php echo $professor["DNI"]." - ".$professor["nom_prof"]." ".$professor["cog_prof"]?></option>
            <?php
        }
    echo "</select></p>
    <p><button type='submit' class='botonform'><img src='img/sendwhitegood.svg' id='fotoenviar'></button></p>
</form>
</div>";
require_once("./views/footer.php");