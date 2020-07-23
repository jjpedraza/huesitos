<?php 
include ("../main/head.php");
include ("../main/menu.php");

$IdApp = "0";
if ( SanPedro($IdApp,$IdUser) == TRUE){
    HeaderApp($IdApp);    
    MiToken_Init($IdUser, $IdApp);

    if (isset($_GET['IdDpto'])){
        $IdDpto = LimpiaVariable($_GET['IdDpto']); 
        $sql = "select * from lista_organigrama WHERE IdDpto='".$IdDpto."'";
        $rc= $db0 -> query($sql);
        if($NOrg = $rc -> fetch_array())
        {
           
            echo "<form action='organigrama.php?x=' method='POST'>";
            echo "<h3 title='IdDpto=".$IdDpto."'>".$NOrg['Departamento']."</h3>";
            echo "<label>Nombre del Nodo: <input type='text' value='".$NOrg['Departamento']."' name='Departamento'></label>";
            
            echo "<form>";
        } else {
            echo "<div class='alert alert-danger'>ERROR: No se ha localizado el Departamento con Id ".$IdDpto."</div>";
        }
        
    } else {
            echo "<div id='ListaResulado' class='Contenidos'>";


            echo "</div>";
            

            echo "<button class='btn-Mas btn-InfDer' >";
            echo "<a href='#FormOrgranigramaAdd' rel='MyModal:open' style='display:block;'>
                    <img src='../icons/mas2.png' ></a>";
            echo "</button>";



            // echo "<br><br><br><button onclick='LeerOrganigrama();'>Cargar</button>";

            echo "<div id='FormOrgranigramaAdd' class='MyModal'>";
            echo "<h1>Añadir Elementos al Organigrama</h1>";

            echo "<form action='organigrama.php?x=' method='POST'>";
            echo "<label>Nombre del Departamento <input type='text' value='' id='DptoNuevo' name='DptoNuevo' required></label>";
            
            echo "<label>Tipo:";
            echo "<select name='Tipo' class='form-control' required>";
            echo "<option value=''></option>";
            $sql="select * from cat_dptonivel
            ";
            $r22w = $db0 -> query($sql); while($f2w = $r22w->fetch_array())
            {//OBTENER LAS COLUMNAS
                echo "<option value='".$f2w['IdDptoNivel']."'>".$f2w['DptoNivel']."</option>";
            }
            echo "</select>";
            echo "</label>";


            echo "<label>De que departamento dependera:";
            echo "<select name='Dependencia' class='form-control' required>";
            echo "<option value=''></option>";
            $sql="select * from organigrama";
            $r2 = $db0 -> query($sql); while($f = $r2->fetch_array())
            {//OBTENER LAS COLUMNAS
                echo "<option value='".$f['IdDpto']."'>".$f['Departamento']."</option>";
            }
            echo "</select></label>";

            echo "<label>Quien sera el Titular:";
            echo "<select name='Titular' title='Solo aparecen en esta lista los que no son titulares' class='form-control' >";
            $sql="select * from lista_empleados
            where Titular='NO'";
            echo "<option value=''></option>";
            $r22 = $db0 -> query($sql); while($f2 = $r22->fetch_array())
            {//OBTENER LAS COLUMNAS
                echo "<option value='".$f2['IdUser']."'>".$f2['NombreCompleto']."</option>";
            }
            echo "</select>";
            echo "</label>";


        

            echo "<input type='submit' value='Guardar' name='BtnGuardar' class='btn btn-primary' style='
            width: 200px;
            height: 50px;
            margin-top: 14px;
            '>";


            echo "</form>";

            
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


            if (isset($_POST['BtnGuardar'])){
                $DptoNuevo = LimpiaVariable($_POST['DptoNuevo']); 
                $Dependencia = LimpiaVariable($_POST['Dependencia']); 
                $Titular = LimpiaVariable($_POST['Titular']); 
                $Tipo = LimpiaVariable($_POST['Tipo']); 

                

                $sql = "INSERT INTO organigrama
                    (Departamento, IdDptoNivel, Dependencia, Titular)
                    VALUES
                    ('$DptoNuevo', '$Tipo', '$Dependencia', '$Titular')";
                    // echo $sql;
                if ($db0->query($sql) == TRUE)
                {
                    Toast("Guardado Correctamente",1,"");
                }
                else
                {
                    Toast("ERROR al guardar (".$sql.")",2,"");
                }
                // Refresh("");

            }
    }
    
} else {
    MsgBlock("No tienes acceso a esta aplicacion", 1);
}


include ("../main/footer.php");

?>