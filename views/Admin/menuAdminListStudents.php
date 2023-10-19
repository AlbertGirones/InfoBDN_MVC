<?php
require_once ("./views/header.php");
if(isset($cadenaRecibida) && isset($_SESSION["user"])){
    echo "<table id='table'>
    <tr>
        <th>DNI</th>
        <th>Nom</th>
        <th>Cognom</th>
        <th>Edat</th>
        <th>Foto</th>
    </tr>";
    foreach($cadenaRecibida as $alumnos) {
        echo "<tr>
            <td>".$alumnos[0]."</td>
            <td>".$alumnos[1]."</td>
            <td>".$alumnos[2]."</td>
            <td>".$alumnos[3]."</td>
            <td>".$alumnos[4]."</td>
        </tr>";
}
echo "</table>";
require_once("./views/footer.php");
}