<div id='menu'>
<?php
if (isset($_GET['home'])){//principal
    echo "<div id='BarraTitulo'>";
    echo "<div class='HomePC'>";
    echo "<table width=100% border=0 id='t2' 
   >";
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
    select DISTINCT idapcat, Categoria from misapps
    where IdUser = '".$IdUser."' and  AppEstado = 0 and idapcat<>''
    order by Categoria
    ";

        $r = $db0 -> query($sql); 	
        while($fCat = $r -> fetch_array())
        {//Datos del Registro de la Empresa
            echo "<section class='aplicaciones'>";
            echo "<Label class='CategoriaNombre'>".$fCat['Categoria']."</label>";
            $sql2 = "select * from misapps
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
    echo "<div id='MenuVertical'>";
    echo "<table height=100% border=0
    style='
    margin-top: -15px;
    margin-left: -3px;
    '
    >";
    echo '
	<tr><td valing=top align=center>
    <a href="index.php?home=" title="Haga clic para ir a la pagina principal" style="

    " id="LogoTopVertical"
    style="";
    >	
    
    <img  src="img/logo_vertical.png" 
    style="width: 60px;" id="xlogo_vertical" title="Haga clic aqui para ir al menu principal">
    
    <img  src="img/logo_vertical2.png" 
    style="width:60px; display:none;" id="xlogo_vertical2" title="Haga clic aqui para ir al menu principal">

    </a>
    </td></tr>
    ';
		

    

    $sql2 = "select * from misapps
    where IdUser = '".$IdUser."' and AppEstado=0
    order by ux DESC limit 10";
    // echo $sql2;
    $r2 = $db0 -> query($sql2); 	
    $title=""; $AppVinculo="";
    
    while($fApp = $r2 -> fetch_array())
    {
        // echo "<article>";
      
        $title=$fApp['AppNombre']." | IdApp = ".$fApp['IdApp'].", Tienes acceso desde ".$fApp['fecha_autorizacion'].", Nivel=".$fApp['nivel']."";    
        $AppVinculo = $fApp['AppVinculo'];
        echo "<tr title='".$title."'>";
        echo "<td valign=middle align=center><a href='".$AppVinculo."' title='".$title."'
        class='MenuIconos'
        style='
     
        '
        
        >";
        echo "<img src='icons/".$fApp['AppIcono']."' style='width:90%'>";
        // echo $fApp['IdApp']." - ".$fApp['ux'];
        echo "</a></td>";
        // echo "<td>";
        // echo "<a href='".$AppVinculo."' style=' display:block;width:100%;' title='Haga Clic aqui para entrar a esta App'>
        //  <b class='AppMenuTitulo'>".$fApp['AppNombre']."</b></a>";
        // echo "<cite class='AppMenuDescripcion'>".$fApp['AppDescripcion']."</cite>";

        // echo "</td>";
        
        echo "</tr>";
        

 

    }

    echo "<tr>";
    echo "<td valign=bottom align=center height=50px>";
    echo "<a href='logout.php' title='Haga clic aqui para Cerrar Cesion'>";
        echo "<img src='icons/salir.png' style='width:90%;'>";
        // echo "<b>Cerrar Sesión</b>";
        echo "</a>";
    echo "</tr>";
    echo "</td>";
    echo "</table>";

    echo "</div>";

    
}

?>
<audio id="AudioVertical" style="display:none;">
    <source src="./audios/speech.wav" type="audio/wav">
</audio>
<script>
$(document).ready(function(){
  $("#LogoTopVertical").hover(cambiar, restaurar);
});

function cambiar(e){
	$("#xlogo_vertical2").show();
	$("#xlogo_vertical").hide();
} 
function restaurar(e){
	$("#xlogo_vertical").show();
	$("#xlogo_vertical2").hide();
  
}

VerticalOcultar();

$(document).ready(function(){
  $("#MenuVertical").hover(VerticalRestaurar, VerticalOcultar);
});

function VerticalOcultar(){
	$("#MenuVertical").css( { "margin-left" : "-56px" } );
	$("#AudioVertical")[0].play();
}

function VerticalRestaurar(){
	$("#MenuVertical").css( { "margin-left" : "0px" } );
	$("#AudioVertical")[0].play();
}
</script>

</div>