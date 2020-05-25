<div id='menu'>
<?php
if (isset($_GET['home'])){//principal
    echo "<div id='BarraTitulo'>";
    echo "<table width=100% border=0>";
    echo "<tr>";
    echo "<td width=200px>";
    echo "<a href='?home='><img src='".$LogoFile."' style='width:200px;'></a>";
    echo "</td>";

    echo "<td align=center valing=top>";
    echo "<h1 style='margin:0px;'>".$EmpresaNombre."</h1>";
    echo "<cite style='font-size:10pt;'>".$EmpresaDescripcion."</cite>";

    echo "</td>";


    echo "<td align=center valing=top>";
    echo "Widgtet";
    echo "</td>";

    echo "</tr>";
    echo "</table>";

    echo  "</div>";




    
    // Presentacion de Apps
    echo "<div id='app_contenedor' >";
        
    $sql = "        
    select DISTINCT idapcat, Categoria from MisApps
    where IdUser = '".$IdUser."' and  AppEstado = 0 and idapcat<>''
    order by Categoria
    ";

        $r = $db0 -> query($sql); 	
        while($fCat = $r -> fetch_array())
        {//Datos del Registro de la Empresa
            echo "<section class='aplicaciones'>";
            echo "<Label class='CategoriaNombre'>".$fCat['Categoria']."</label>";
            $sql2 = "select * from MisApps
            where IdUser = '".$IdUser."' and  AppEstado = 0 and idapcat='".$fCat['idapcat']."'";
            $r2 = $db0 -> query($sql2); 	
            while($fApp = $r2 -> fetch_array())
            {
                echo "<article>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<td><img src='_icons/".$fApp['AppIcono']."' style='width:32px'></td>";
                    echo "<td>";
                    echo "<b>".$fApp['AppNombre']."</b>";
                    echo "<cite>".$fApp['AppDescripcion']."</cite>";

                    echo "</td>";
                    
                    echo "</tr>";
                    echo "</table>";
                echo "</article>";
            }
                

                
            echo "</section>";
        


        }
        
    	
    echo "</div>";


} else {//menu durante una app


    
}

?>

</div>