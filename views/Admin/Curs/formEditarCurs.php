<?php
require_once("./views/header.php");
echo "<div class='header'>
            <img src='img/logo.svg' alt='Logo'>
            <div class='navmenu'>
            <a href='index.php?controller=Cursos&action=showCursos'><p>Ves enrere ...</p></a>
            </div>
        </div>
        <div id='adminlog'>
            <h1>Modificar curs</h1>
            <form action='index.php?controller=Cursos&action=saveFormEditCurs' method='post' enctype='multipart/form-data'>";
                foreach ($listado as $curs) {
                    echo "<p><input type='number' name='id' id='id' value='".$curs['codi_curs']."' class='campoform' readonly></p>
                    <p><input type='text' name='nom_curs' id='nom_curs' value='".$curs['nom_curs']."' class='campoform' ></p>
                    <p><input type='text' name='desc_curs' id='desc_curs' value='".$curs['desc_curs']."' class='campoform' ></p>
                    <p><input type='number' name='hores_curs' id='hores_curs' value='".$curs['hores_curs']."' class='campoform' ></p>
                    <p><input type='date' name='ini_curs' id='ini_curs' value='".$curs['ini_curs']."' class='campoform' ></input></p>
                    <p><input type='date' name='fin_curs' id='fin_curs' value='".$curs['fin_curs']."' class='campoform' ></input></p>
                    <p><br><select name='DNI_prof' id='DNI_prof'>";
                    foreach ($professores as $professor) {
                        if($professor["DNI"] == $curs['DNI_prof']){
                            ?>
                            <option selected value='<?php echo $professor["DNI"] ?>'><?php echo $professor["DNI"]." - ".$professor["nom_prof"]." ".$professor["cog_prof"]?></option>
                            <?php
                        }
                        else{
                            ?>
                            <option value='<?php echo $professor["DNI"] ?>'><?php echo $professor["DNI"]." - ".$professor["nom_prof"]." ".$professor["cog_prof"]?></option>
                            <?php
                        }

                    }
                    echo "</select></p>";
                }
                echo "<p><button type='submit'>Modificar professor</button></p>";
            echo "</form>
        </div>";
require_once("./views/footer.php");