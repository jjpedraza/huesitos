<?php
if (isset($_GET['x'])){
	// include("seguridad.php");
	require("../config.php");
	require("../components.php");
	
} else {
	// include("seguridad.php");
	require("./config.php");
	require("./components.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $EmpresaNombre;?></title>
    <meta http-equiv="x-ua-compatible" content="ie-edge">

<?php
$dir = "";
if (isset($_GET['x'])){
	$dir = "../";
} else {
	
}


echo '

<script src="'.$dir.'lib/popper.min.js"></script>
<script src="'.$dir.'lib/jquery-3.5.1.js"></script>
<script src="'.$dir.'lib/bootstrap/js/bootstrap.min.js"></script>';


echo '
<link rel="stylesheet" href="'.$dir.$theme.'"/>

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


</head>
<body>
	