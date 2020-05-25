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
        

        $r = $db0 -> query("select * from app_categorias"); 	
        while($f = $r -> fetch_array())
        {//Datos del Registro de la Empresa
            echo "<section class='aplicaciones'>";
            echo "<Label>".$f['nombre']."</label>";

                echo "<article>";
                    echo "App 1";
                echo "</article>";

                echo "<article>";
                    echo "App 2";
                echo "</article>";
            echo "</section>";
        


        }
        
    	
    echo "</div>";


} else {//menu durante una app


    
}

?>

</div>