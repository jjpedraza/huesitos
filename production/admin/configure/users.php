<?php 
include ("../main/head.php");
include ("../main/menu.php");

$IdApp = "1";
$Nivel = AppNivel($IdUser, $IdApp);

// $Nivel = 2;
if ( SanPedro($IdApp,$IdUser) == TRUE){
    HeaderApp($IdApp);    
    MiToken_Init($IdUser, $IdApp);
    //ACCTIONS

    //Ortorgar acceso
    if (isset($_GET['IdUser']) && isset($_GET['IdApp']) && isset($_GET['nivel']) ) {
        $Add_IdUser = LimpiaVariable($_GET['IdUser']); 
        $Add_IdApp = LimpiaVariable($_GET['IdApp']); 
        $Add_nivel = LimpiaVariable($_GET['nivel']); 

        $sql = "INSERT INTO apps_seguridad(IdUser, IdApp, nivel, quien_autorizo, fecha_autorizacion) 
        VALUES (
            '".$Add_IdUser."', 
            '".$Add_IdApp."', 
            '".$Add_nivel."',
            '".$IdUser."',
            '".$fecha."'
            
        )";
        // echo $sql;

        if ($db0->query($sql) == TRUE){                               
            Historia($IdUser, $IdApp, 'Permiso otorgado correctamente a la IdApp '.$Add_IdApp.' a '.$Add_IdUser. ' con nivel '.$Add_nivel.': sql='.$sql);
            Toast("Permiso guardado correctamente",1,"");
        } else {
            Toast("Error al guardar el permiso ",2,"");
        }
        // Refresh('');

    } else {
        // echo "no";
    }

    //ACCTIONS -<> Quitar acceso
    if (isset($_GET['del']) and isset($_GET['idapp'])){ //quitar acceso
        $IdUserDel = LimpiaVariable($_GET['del']); 
        $IdAppDel = LimpiaVariable($_GET['idapp']); 
        $sql = "DELETE FROM apps_seguridad
        WHERE IdUser = '".$IdUserDel."' and IdApp='".$IdAppDel."'
        ";
        
            //echo $sql;

        if ($db0->query($sql) == TRUE){                               
            Historia($IdUser, $IdApp, 'Elimino el permiso del usuario ('.$IdUserDel.') '.UserName($IdUserDel). ' de la app '.$IdAppDel.': sql='.$sql);
            Toast("Permiso retirado ".$IdAppDel." | ".$IdUserDel." Correctamente",1,"");
        } else {
            Toast("Error al retirar el permiso al usuario ".$IdUserDel.".",2,"");
        }

    }


    if (isset($_POST['MbtnFormUpdate'])){//clic en actualizar
        $txtIdUser = LimpiaVariable($_POST['txtIdUser']); 
        $txtIdNombre = LimpiaVariable($_POST['txtIdNombre']); 
        $txtIdPaterno = LimpiaVariable($_POST['txtIdPaterno']); 
        $txtIdMaterno = LimpiaVariable($_POST['txtIdMaterno']); 

        $txtSexo = LimpiaVariable($_POST['txtSexo']); 
        $txtPuesto = LimpiaVariable($_POST['txtPuesto']); 
        $txtDpto = LimpiaVariable($_POST['txtDpto']); 
        $txtDomicilio = LimpiaVariable($_POST['txtDomicilio']); 
        $txtTelefonoTrabajo = LimpiaVariable($_POST['txtTelefonoTrabajo']); 
        $txtTelefonoMovil = LimpiaVariable($_POST['txtTelefonoMovil']); 
        $txtTelefonoTrabajoExtension = LimpiaVariable($_POST['txtTelefonoTrabajoExtension']); 
        $txtTelefonoPersonal = LimpiaVariable($_POST['txtTelefonoPersonal']); 
        
        $sql = "UPDATE  empleados
        SET
        Nombre  =   '".$txtIdNombre."', 
        Paterno =   '".$txtIdPaterno."',
        Materno =   '".$txtIdMaterno."',
        IdSexo  =   '".$txtSexo."',
        IdPuesto    =   '".$txtPuesto."',
        IdDpto  =   '".$txtDpto."',
        Domicilio   =   '".$txtDomicilio."',
        TelefonoTrabajo  =   '".$txtTelefonoTrabajo."',
        TelefonoMovil = '".$txtTelefonoMovil."',
        TelefonoTrabajoExtension    =   '".$txtTelefonoTrabajoExtension."',
        TelefonoPersonal    =   '".$txtTelefonoPersonal."'
            
        WHERE IdUser = '".$txtIdUser."'
        ";
        
            //echo $sql;

        if ($db0->query($sql) == TRUE){                               
            Historia($IdUser, $IdApp, 'Actualizo los datos del empleado '.$txtIdNombre.' '.$txtIdPaterno. ' '.$txtIdMaterno.': sql='.$sql);
            Toast("Actualizado ".$txtIdUser." Correctamente",1,"");
        } else {
            Toast("Error al actualizar al usuario ".$txtIdUser.".",2,"");
        }
            //Refresh('');
    }

    if (isset($_POST['MbtnFormAdd'])) {//Click en Guardar
        $txtIdUser = LimpiaVariable($_POST['txtIdUser']); 
        $txtIdNombre = LimpiaVariable($_POST['txtIdNombre']); 
        $txtIdPaterno = LimpiaVariable($_POST['txtIdPaterno']); 
        $txtIdMaterno = LimpiaVariable($_POST['txtIdMaterno']); 

        $txtSexo = LimpiaVariable($_POST['txtSexo']); 
        $txtPuesto = LimpiaVariable($_POST['txtPuesto']); 
        $txtDpto = LimpiaVariable($_POST['txtDpto']); 
        $txtDomicilio = LimpiaVariable($_POST['txtDomicilio']); 
        $txtTelefonoTrabajo = LimpiaVariable($_POST['txtTelefonoTrabajo']); 
        $txtTelefonoMovil = LimpiaVariable($_POST['txtTelefonoMovil']); 
        $txtTelefonoTrabajoExtension = LimpiaVariable($_POST['txtTelefonoTrabajoExtension']); 
        $txtTelefonoPersonal = LimpiaVariable($_POST['txtTelefonoPersonal']); 
        
        $sql = "INSERT INTO empleados(IdUser, Nombre, Paterno, Materno, IdSexo, IdPuesto, IdDpto, Domicilio, TelefonoTrabajo, TelefonoMovil, TelefonoTrabajoExtension, TelefonoPersonal) 
        VALUES (
            '".$txtIdUser."', 
            '".$txtIdNombre."', 
            '".$txtIdPaterno."',
            '".$txtIdMaterno."',
            '".$txtSexo."',
            '".$txtPuesto."',
            '".$txtDpto."',
            '".$txtDomicilio."',
            '".$txtTelefonoTrabajo."',
            '".$txtTelefonoMovil."',
            '".$txtTelefonoTrabajoExtension."',
            '".$txtTelefonoPersonal."'
            
        )";
        // echo $sql;

        if ($db0->query($sql) == TRUE){                               
            Historia($IdUser, $IdApp, 'Guardo al empleado '.$txtIdNombre.' '.$txtIdPaterno. ' '.$txtIdMaterno.': sql='.$sql);
            Toast("Guardado ".$txtIdUser." Correctamente",1,"");
        } else {
            Toast("Error al guardar al usuario ".$txtIdUser.".",2,"");
        }
        Refresh('');

    }


    if (isset($_GET['update'])){//Modo actualizacion
        echo "<div id='Update' class='Contenidos' >";
        $IdUser_Update = LimpiaVariable($_GET['update']); 
        $sql = "
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
        where IdUser='".$IdUser_Update."'";
        $rUp= $db0 -> query($sql);
        if($fUp= $rUp -> fetch_array())
        {
            
        
        echo "<h3>Actualizacion de datos: <b style='color:green;'>".$fUp['NombreCompleto']."</b></h3>";

          echo "<form action='users.php?x='   method='POST' id='FUpdate".$fUp['IdUser']."' 
            name='FUpdate".$fUp['IdUser']."'>";
            echo "<input type='text' id='txtIdUser' name='txtIdUser' value='".$fUp['IdUser']."' >"; 
            echo "<label class='FormElementos'>Nombre: <input  type='text' id='txtIdNombre' name='txtIdNombre' placeholder='' value='".$fUp['Nombre']."' ></label>";
            echo "<label class='FormElementos'>Ap.Paterno: <input required type='text' id='txtIdPaterno' name='txtIdPaterno' placeholder='' value='".$fUp['Paterno']."' ></label>";
            echo "<label class='FormElementos'>Ap.Materno: <input required type='text' id='txtIdMaterno' name='txtIdMaterno' placeholder='' value='".$fUp['Materno']."' ></label>";
            echo "<label class='FormElementos'>
                Sexo:
                <select name='txtSexo' required>
                    <option value=''></option>
                    <option value=0>Hombre</option>
                    <option value=1>Mujer</option>
                    <option value='".$fUp['IdSexo']."' selected>".$fUp['Sexo']."</option>
                </select>
            </label>
            ";
        
            echo "<label class='FormElementos'>
            Puesto:
            <select name='txtPuesto' required>
               <option value=''></option>
             ";
            $sql="select * from cat_puestos order by Puesto";
            $rPuesto= $db0 -> query($sql);
            while($fPuesto = $rPuesto -> fetch_array()) {
                echo " <option value='".$fPuesto['IdPuesto']."'>".$fPuesto['Puesto']."</option>";
            }
            echo " <option value='".$fUp['IdPuesto']."' selected>".$fUp['Puesto']."</option>";
            echo    "
                </select>
            </label>
            ";
        
        
            echo "<label class='FormElementos'>
            Departamento:
            <select name='txtDpto' required>
            <option value=''></option>
             ";
            $sql="select * from organigrama order by Departamento";
            $rOrg= $db0 -> query($sql);
            while($fOrg = $rOrg -> fetch_array()) {
                echo " <option value='".$fOrg['IdDpto']."'>".$fOrg['Departamento']."</option>";
            }
            echo " <option value='".$fUp['IdDpto']."' selected>".$fUp['Departamento']."</option>";
            echo    "
                </select>
            </label>
            ";
            
        
            echo "<label class='FormElementos' style='width:80%;'>
            Domicilio:<br>
            <textarea name='txtDomicilio' style='width:99%;'>".$fUp['Domicilio']."</textarea>
            
            
            </label>
            ";
            
        
            echo "<label class='FormElementos'>Telefono Trabajo: <input type='text' id='txtTelefonoTrabajo' name='txtTelefonoTrabajo' placeholder='' value='".$fUp['TelefonoTrabajo']."' ></label>";
            echo "<label class='FormElementos'>Telefono Movil: <input type='text' id='txtTelefonoMovil' name='txtTelefonoMovil' placeholder='' value='".$fUp['TelefonoMovil']."' ></label>";
            echo "<label class='FormElementos'>Extension Tel. (Trabajo): <input type='text' id='txtTelefonoTrabajoExtension' name='txtTelefonoTrabajoExtension' placeholder='' value='".$fUp['TelefonoTrabajoExtension']."' ></label>";
            echo "<label class='FormElementos'>Telefono Personal: <input type='text' id='txtTelefonoPersonal' name='txtTelefonoPersonal' placeholder='' value='".$fUp['TelefonoPersonal']."' ></label>";
        
        
            echo "<label >Revise los datos antes de Actualizar:
            <input type='submit' name='MbtnFormUpdate' value='Actualizar' class='Mbtn btn-Primary'>
            </label>
            ";

            echo "</form><br><br><br>";

        } else {
            MsgBlock("No se ha encontrado informacion sobre el usuario con IdUser:".$IdUser_Update,1);
        }
        echo "</div>";
    } else {


        if (isset($_GET['apps'])) {//Administracion de Apps del Usuarios
            echo "<div class='Contenidos'>";
            $IdUser_Apps = LimpiaVariable($_GET['apps']); 
            echo "<h3>Administracion de Aplicacion del Usuario <b style='color:green'>".UserName($IdUser_Apps)."</b></h3>";
            echo "<h3 style='text-align:left; margin:5px; color:green; font-family:Light;'>Apps actualmente con acceso: </h3>";
            $sql="select 
            * 
            from  misapps
            where IdUser='".$IdUser_Apps."'";
            $rA= $db0 -> query($sql);
            $AppsConAcceso = "";
            echo "<table class='tabla'>";
            while($fA= $rA -> fetch_array()) {
                echo "<tr>";
                echo "<td width=80px><img src='../icons/".$fA['AppIcono']."' style='width:40px;'></td>";
                echo "<td align=left><b style='font-weight:bold;font-size:12pt;'>".$fA['AppNombre']."</b><br><cite>".$fA['AppDescripcion']." de ".
                $fA['Categoria']."</cite><br></td>";
                echo "<td align=left>Acceso de nivel ".$fA['nivel']." desde ".$fA['fecha_autorizacion']." por ".$fA['quien_autorizo']."</td>";
                echo "<td width=30% align=right>";
                echo "<a href='?x=&del=".$fA['IdUser']."&idapp=".$fA['IdApp']."&apps=".$fA['IdUser']."' class='Mbtn btn-Danger' style='width:40px'><img src='../icons/cancel.png' style='width:20px;'></a>";
                echo "<br><br><cite>".AppNota($fA['IdApp'])."</cite>";
                echo "</td>";
                echo "</tr>";
                $AppsConAcceso = $AppsConAcceso.$fA['IdApp'].",";

            }
            $AppsConAcceso = substr($AppsConAcceso, 0, -1);
            echo "</table>";

            echo "<hr>";
            echo "<h3 style='text-align:left; margin:5px; color:orange; font-family:Light;'>Apps sin acceso: </h3>";
            //echo "App con Acceso: ".$AppsConAcceso;

            $sql="
            select 
            a.idapp as IdApp,
            a.nombre as AppNombre,
            a.descripcion as AppDescripcion,
            a.vinculo as AppVinculo,
            a.icono as AppIcono,
            a.idapcat,
            (select apps_categorias.nombre from apps_categorias where idapcat = a.idapcat) as Categoria,
            a.admin_comentario as Nota

            from apps a
            where IdApp not in (".$AppsConAcceso.") and estado=0
            ";
            $rNotA= $db0 -> query($sql);
            echo "<table class='tabla'>";
            while($fNotA= $rNotA -> fetch_array()) {
                echo "<tr>";
                echo "<td width=80px><img src='../icons/".$fNotA['AppIcono']."' style='width:40px;'></td>";
                echo "<td align=left><b style='font-weight:bold;font-size:12pt;'>".$fNotA['AppNombre']."</b><br><cite>".$fNotA['AppDescripcion']." de ".
                $fNotA['Categoria']."</cite><br></td>";
              
                echo "<td width=350px align=right>
                <form action='users.php' method='GET' style='text-align:right;'>
                <input type='hidden' name='x' value=''>
                <input type='hidden' name='IdUser' value='".$IdUser_Apps."'>
                <input type='hidden' name='apps' value='".$IdUser_Apps."'>
                <input type='hidden' name='IdApp' value='".$fNotA['IdApp']."'>
                
                
                <select name='nivel'
                style='
                    width:200px;
                    display:inline-block;
                    font-size:9pt;
                    font-family:Light;
                '
                >
                <option value='1'>Nivel 1 (Administrador Gral)</option>
                <option value='2'>Nivel 2 (Administrador)</option>
                <option value='3'>Nivel 3 (Operador)</option>
                <option value='4'>Nivel 4 (Consulta)</option>
                </select>

                
                <input
                style='
                    width:100px;
                    display:inline-block;
                '
                type='submit' class='Mbtn btn-Primary' value='Ok'>
                
                

                </form>";
                
                echo "<cite>".AppNota($fNotA['IdApp'])."</cite>";
                echo "</td>";
                echo "</tr>";
                $AppsConAcceso = $AppsConAcceso.$fNotA['IdApp'].",";

            }
            echo "</div>";


        } else {
            echo "<div id='ListaResulado' class='Contenidos'>";


            echo "</div>";
        }
    
    }







    if ($Nivel == 1|| $Nivel==3){
        echo "<button class='btn-Mas btn-InfDer' >";
        echo "<a href='#FormAdd' rel='modal:open' style='display:block;'>
        <img src='../icons/mas2.png' ></a>";
        echo "</button>";

       
    } else {
        Toast("Tu nivel es ".$Nivel.", no puede añadir nuevos usuarios",0,"");
    }



    // echo "<br><br><br><button onclick='LeerOrganigrama();'>Cargar</button>";

    echo "<div id='FormAdd' class='modal'>";
    echo "<form action=''   id='FormAddF'  name= 'FormAddF'  method='POST'>";
    echo "<h1>Registrar a nuevo empleado</h1>";
    echo "<label class='FormElementos'>IdUser: <input required type='text' id='txtIdUser' name='txtIdUser' placeholder='' title='Escriba el numero de control, con el que manejan a los empleados. No usar signos ni espacios'value='' ></label>";
    echo "<label class='FormElementos'>Nombre: <input requiredtype='text' id='txtIdNombre' name='txtIdNombre' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>Ap.Paterno: <input required type='text' id='txtIdPaterno' name='txtIdPaterno' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>Ap.Materno: <input required type='text' id='txtIdMaterno' name='txtIdMaterno' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>
        Sexo:
        <select name='txtSexo' required>
            <option value=''></option>
            <option value=0>Hombre</option>
            <option value=1>Mujer</option>
        </select>
    </label>
    ";

    echo "<label class='FormElementos'>
    Puesto:
    <select name='txtPuesto' required>
       <option value=''></option>
     ";
    $sql="select * from cat_puestos order by Puesto";
    $r= $db0 -> query($sql);
    while($f = $r -> fetch_array()) {
        echo " <option value='".$f['IdPuesto']."'>".$f['Puesto']."</option>";
    }
    echo    "
        </select>
    </label>
    ";


    echo "<label class='FormElementos'>
    Departamento:
    <select name='txtDpto' required>
    <option value=''></option>
     ";
    $sql="select * from organigrama order by Departamento";
    $r2= $db0 -> query($sql);
    while($f2 = $r2 -> fetch_array()) {
        echo " <option value='".$f2['IdDpto']."'>".$f2['Departamento']."</option>";
    }
    echo    "
        </select>
    </label>
    ";
    

    echo "<label class='FormElementos' style='width:100%;'>
    Domicilio:<br>
    <textarea name='txtDomicilio' style='width:99%;'></textarea>
    
    
    </label>
    ";
    

    echo "<label class='FormElementos'>Telefono Trabajo: <input type='text' id='txtTelefonoTrabajo' name='txtTelefonoTrabajo' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>Telefono Movil: <input type='text' id='txtTelefonoMovil' name='txtTelefonoMovil' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>Extension Tel. (Trabajo): <input type='text' id='txtTelefonoTrabajoExtension' name='txtTelefonoTrabajoExtension' placeholder='' value='' ></label>";
    echo "<label class='FormElementos'>Telefono Personal: <input type='text' id='txtTelefonoPersonal' name='txtTelefonoPersonal' placeholder='' value='' ></label>";


    echo "<label>Vefique los datos:<input type='submit' name='MbtnFormAdd' value='Guardar' class='Mbtn btn-Primary'></label>";
    echo "</form>";
    echo "</div>";

    echo "
    <script>
    
    function LeerOrganigrama(){   
        $('#PreLoader').show();
        $.ajax({
            url: 'users_datos.php',
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