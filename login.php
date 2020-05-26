<?php
require("./config.php");
require("./components.php");

$IdUser = "2809";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $EmpresaNombre;?></title>

	<link rel="stylesheet" href="<?php echo $theme; ?>"/>
	<script src="lib/jquery-3.3.1.js"></script> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">


	<link rel="stylesheet" href="lib/jquery.toast.min.css">
	<script type="text/javascript" src="lib/jquery.toast.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/datatables.min.css"/> 
    <script type="text/javascript" src="lib/datatables.min.js"></script>
    <style>
        body {
            background-image: url('https://source.unsplash.com/random/1920x1080/?wallpaper');
        }
    </style>
</head>
<body>
<div id='Login'>
<h1 style='

'> Identificate: </h1>


<form action='login.php' method='POST' >
	<label>Usuario: <input type='text' name='User'></label>
	<label>NIP: <input type='Password' name='Password'></label>
	<label style='background-color:transparent;'><input type='submit' style='height:60px; margin-top:-5px;' value='Entrar' class='btn btn-Primary' name='FormLogin'></label>
</form>
</div>
<?php
if (isset($_POST['FormLogin'])){
    require("config.php");
    $txtUser = $_POST['User']; if (ValidaVAR($txtUser)==TRUE){$txtUser = LimpiarVAR($txtUser);} else {$txtUser = "";}
    $txtNIP = $_POST['Password']; if (ValidaVAR($txtNIP)==TRUE){$txtNIP = LimpiarVAR($txtNIP);} else {$txtNIP = "";}
    
	$sql = "select a.*    
    from empleados a where 
    IdUser='".$txtUser."' and estado=''";
    $rc= $db0 -> query($sql);
	if($f = $rc -> fetch_array())
	{                
        if ($f['nip']==$txtNIP){

                $IdUser = $f['IdUser'];	// variable de entorno      
                session_start();    
                session_regenerate_id();                
                global $IdUser; //generalize       

                $_SESSION['IdUser']=$f['IdUser']; //session		

                
                // historia($nitavu,'Acceso TransparenciaGo'.InfoEquipo().'');			    
                SESSION_init(session_id(), $IdUser, $SesionName, InfoEquipo(), "");    
                echo '<script>window.location.replace("index.php")</script>'; 
            
        } else {
            Toast("NIP Incorrecto",2,"");
        }
        
        
        
	} else {
        Toast("Usuario No Valido",2,"");
        
	}
}

?>

<div id='Informatica'>
    <?php echo "<b>".$EmpresaNombre."</b><br>"; 
    
    ?>
    <cite style='font-size:8pt;'>Cualquier Duda, Comunicate al Departamento de Informatica</cite><br>
    
</div>


</body>
</html>