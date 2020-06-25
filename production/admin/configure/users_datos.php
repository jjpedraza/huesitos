<?php
require("../config.php");
require("../components.php");

//Validar Token

if (isset($_POST['IdUser']) and isset($_POST['IdApp'])){

    $IdApp = LimpiaVariable($_POST['IdApp']); 
    $MiToken = MiToken($IdUser, $IdApp); //Creamos Token al inciiar la app

    if (MiToken_valida($MiToken, $IdUser, $IdApp)==TRUE){
        //echo "Token Valido: ".$MiToken;
        $sql="
        select 
        a.IdUser,
        CONCAT(a.Nombre, ' ', a.Paterno, ' ',a.Materno) as NombreCompleto,
        a.IdPuesto,
        ifnull((select cat_puestos.Puesto from cat_puestos where IdPuesto = a.IdPuesto),'') as Puesto,
        ifnull((select Sexo from cat_sexo where IdSexo = a.IdSexo),'') as Sexo,
        a.IdDpto,
        (select organigrama.Departamento from organigrama where organigrama.IdDpto = a.IdDpto) as Departamento,
        (select EstadoLaboral from cat_estadolaboral where IdEstadoLaboral = a.IdEstadoLaboral) as EstadoLaboral,
        a.*
        from empleados a 
        ";
        $r= $db0 -> query($sql);
        echo "<table class='tabla'>";
        echo "<th>IdUser</th>";
        echo "<th>Nombre</th>";        
        echo "<th class='pc'>Puesto</th>";
        echo "<th class='pc'>Departamento</th>";
        echo "<th></th>";
        

        while($f = $r -> fetch_array()) {



            echo "<tr>";
            echo "<td><a title='Haga clic para modificar la información de este usuario' href='?x=&update=".$f['IdUser']."' class='Mbtn btn-Default' style='
                padding: 5px;
                width: 90%;
                display: inline-block;
                text-decoration: none;
                color: #595959;'>".$f['IdUser']."</a></td>";
            echo "<td>".$f['NombreCompleto']."</td>";            
            echo "<td class='pc'>".$f['Puesto']."</td>";
            echo "<td class='pc'>".$f['Departamento']."</td>";
            echo "<td><a href='?x=&apps=".$f['IdUser']."' class='Mbtn btn-Default' style='margin:5px;display:inline-block;'>
            <img src='../icons/misapps.png' style='width:24px;'>
            </a></td>";


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