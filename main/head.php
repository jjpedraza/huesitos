<?php
if (isset($_GET['x'])){
	include("seguridad.php");
	require("../config.php");
	require("../components.php");
	
} else {
	include("seguridad.php");
	require("./config.php");
	require("./components.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $EmpresaNombre;?></title>


<?php
$dir = "";
if (isset($_GET['x'])){
	$dir = "../";
} else {
	
}

echo '
<link rel="stylesheet" href="'.$dir.$theme.'"/>
<script src="'.$dir.'lib/jquery-3.3.1.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">


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
	