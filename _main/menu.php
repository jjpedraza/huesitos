<div id='menu'>
<?php
if (isset($_GET['home'])){//principal
    echo "<div id='BarraTitulo'>";
    echo "<div class='HomePC'>";
    echo "<table width=100% border=0 id='t2'>";
    echo "<tr>";    
    echo "<td width=200px>";
    echo "<a href='?home='><img src='".$LogoFile."' class='Logo'></a>";
    echo "</td>";

    echo "<td align=center valing=top class='HomeTitulo'>";
    
    echo "<h1 style='margin:0px;'>".$EmpresaNombre."</h1>";
    echo "<cite style='font-size:10pt;'>".$EmpresaDescripcion."</cite>";

    echo "</td>";


    echo "<td align=center valing=top class='HomeWidget'>";
    echo "Widgtet";
    echo "</td>";
    echo "</tr>";    
    echo "</table>";
    echo "</div>";


    //Para moviles
    echo "<div class='HomeMovil'>";
  
    echo "<a href='?home='><img src='".$LogoFile."' class='Logo'></a>";
    echo "</td>";

    echo "</div>";

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
            $title=""; $AppVinculo="";
            while($fApp = $r2 -> fetch_array())
            {
                echo "<article>";
                    echo "<table width=100% border=0>";
                    $title="IdApp = ".$fApp['IdApp'].", Tienes acceso desde ".$fApp['fecha_autorizacion'].", Nivel=".$fApp['nivel'];    
                    $AppVinculo = $fApp['AppVinculo'];
                    echo "<tr title='".$title."'>";
                    echo "<td width=50px><a href='".$AppVinculo."' title='Haga clic aqui para Entrar a esta Aplicacion'>
                    <img src='icons/".$fApp['AppIcono']."' style='width:32px'></a></td>";
                    echo "<td>";
                    echo "<a href='".$AppVinculo."' style=' display:block;width:100%;' title='Haga Clic aqui para entrar a esta App'>
                     <b class='AppMenuTitulo'>".$fApp['AppNombre']."</b></a>";
                    echo "<cite class='AppMenuDescripcion'>".$fApp['AppDescripcion']."</cite>";

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