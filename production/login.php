<?php
require("./config.php");
require("./components.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $EmpresaNombre;?></title>

	<link rel="stylesheet" href="<?php echo $theme; ?>"/>
	<script src="lib/jquery-3.3.1.js"></script> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

<?php
$dir = "";
echo '
<link rel="stylesheet" href="'.$dir.$theme.'"/>
<script src="'.$dir.'lib/jquery-3.3.1.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

<link rel="stylesheet" type="text/css" href="'.$dir.'lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="'.$dir.'lib/jquery.toast.min.css">
<script type="text/javascript" src="'.$dir.'lib/jquery.toast.min.js"></script>
<link rel="stylesheet" type="text/css" href="'.$dir.'lib/datatables.min.css"/> 
<script type="text/javascript" src="'.$dir.'lib/datatables.min.js"></script>
<script src="'.$dir.'lib/jquery.modalpdz.js"></script> 
<link rel="stylesheet" href="'.$dir.'lib/jquery.modalcsspdz.css" />
';

?>
    <style>
        body {
            background-color:#ffa54d;
            
        }
    </style>
</head>
<body>
<img src='img/man1.png' class='pc'
style='
    position:fixed;
    top:0px;
    left:-300px;
    height:100%;
';
>
<div id='Login' >


<form class="form-signin" style='text-align:center;'>
  <img src='img/logo.png' style='width:200px;'>
  <h1 class="h3 mb-3 font-weight-normal">Identificate:</h1>
  <label for="inputEmail" class="sr-only">Correo Electronico</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label><br>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <br><br>
</form>

</div>
<?php
if (isset($_POST['FormLogin'])){
    require("config.php");
    $txtUser = $_POST['User']; if (ValidaVAR($txtUser)==TRUE){$txtUser = LimpiarVAR($txtUser);} else {$txtUser = "";}
    $txtNIP = $_POST['Password']; if (ValidaVAR($txtNIP)==TRUE){$txtNIP = LimpiarVAR($txtNIP);} else {$txtNIP = "";}
    
	$sql = "select a.*    
    from clientes a where 
    Correo='".$txtUser."' and Estado=0";
    $rc= $db0 -> query($sql);
	if($f = $rc -> fetch_array())
	{                
        if ($f['password']==$txtNIP){

                $IdUser = $f['Correo'];	// variable de entorno      
                session_start();    
                session_regenerate_id();                
                global $WbRIdUser; //generalize       

                $_SESSION['WbRIdUser']=$f['Correo']; //session		

                
                // historia($nitavu,'Acceso TransparenciaGo'.InfoEquipo().'');			    
                SESSION_init(session_id(), $WbRIdUser, $SesionName, InfoEquipo(), "");    
                echo '<script>window.location.replace("index.php?home=")</script>'; 
            
        } else {
            Toast("Password  Incorrecto",2,"");
        }
        
        
        
	} else {
        Toast("Usuario No Valido",2,"");
        
	}
}

?>

<div id='Informatica'>
    <h3>Registrate!, Asociate y crezcamos juntos.</h3>
    <br>

    
</div>


<?php
echo '

<script src="'.$dir.'lib/popper.min.js"></script>
<script src="'.$dir.'lib/jquery-3.5.1.slim.min.js"></script>
<script src="'.$dir.'lib/bootstrap/js/bootstrap.min.js"></script>';

?>
</body>
</html>