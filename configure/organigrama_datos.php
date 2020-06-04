<?php
require("../config.php");
require("../components.php");

//Validar Token

if (isset($_POST['IdUser']) and isset($_POST['IdApp'])){
    $IdUser = LimpiaVariable($_POST['IdUser']); 
    $IdApp = LimpiaVariable($_POST['IdApp']); 
    $MiToken = MiToken($IdUser, $IdApp); //Creamos Token al inciiar la app

    if (MiToken_valida($MiToken, $IdUser, $IdApp)==TRUE){
        //echo "Token Valido: ".$MiToken;
        $sql="select * from organigrama";
        $r= $db0 -> query($sql);
        echo "<table class='tabla'>";
        echo "<th>IdDpto</th>";
        echo "<th>Dependencia</th>";
        echo "<th>Departamento</th>";
        echo "<th>IdDptoNivel</th>";
        echo "<th>Titular</th>";
        

        while($f = $r -> fetch_array()) {
            echo "<tr>";
            echo "<td>".$f['IdDpto']."</td>";
            echo "<td>".$f['Dependencia']."</td>";
            echo "<td>".$f['Departamento']."</td>";
            echo "<td>".$f['IdDptoNivel']."</td>";
            echo "<td>".$f['Titular']."</td>";


            echo "</tr>";
        }
        echo "</table>";



    } else {
        echo "Token invalido: ".$MiToken;
    }
}
else {
    echo "Parametros incompletos";
}


?>