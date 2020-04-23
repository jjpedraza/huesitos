<?php
require("./_config.php");
require("./_components.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $Empresa_title;?></title>

	<link rel="stylesheet" href="<?php echo $theme; ?>"/>
	<script src="_lib/jquery-3.3.1.js"></script> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">


	<link rel="stylesheet" href="_lib/jquery.toast.min.css">
	<script type="text/javascript" src="_lib/jquery.toast.min.js"></script>
	<link rel="stylesheet" type="text/css" href="_lib/datatables.min.css"/> 
	<script type="text/javascript" src="_lib/datatables.min.js"></script>
</head>
<body>
	