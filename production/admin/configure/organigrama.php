<?php 
include ("../main/head.php");
include ("../main/menu.php");

$IdApp = "0";
if ( SanPedro($IdApp,$IdUser) == TRUE){
    HeaderApp($IdApp);    
    MiToken_Init($IdUser, $IdApp);
    echo "<div id='ListaResulado' class='Contenidos'>";


    echo "</div>";

    echo "<button class='btn-Mas btn-InfDer' >";
    echo "<a href='#FormOrgranigramaAdd' rel='modal:open' style='display:block;'>
    <img src='../icons/mas2.png' ></a>";
    echo "</button>";
    echo "<br><br><br><button onclick='LeerOrganigrama();'>Cargar</button>";

    echo "<div id='FormOrgranigramaAdd' class='modal'>";
    echo "<h1>Añadir Elementos al Organigrama</h1>";
    echo "</div>";

    echo "
    <script>
    
    function LeerOrganigrama(){   
        $('#PreLoader').show();
        $.ajax({
            url: 'organigrama_datos.php',
            type: 'post',        
            data: {IdUser:'".$IdUser."', IdApp: '".$IdApp."'},
            success: function(data){
                $('#ListaResulado').html(data);
                $('#PreLoader').hide();
            }
        });
        
    }
    LeerOrganigrama();


    function Organigrama_Add(){
    }
    
    </script>
    ";


    
} else {
    MsgBlock("No tienes acceso a esta aplicacion", 1);
}


include ("../main/footer.php");

?>