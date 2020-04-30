<?php



//CLIENTE
$Empresa = "PrymeCode";
$Empresa_title = "PrymeCode :)";
$Empresa_website = "https://prymecode.com";
$Empresa_tels = "8343088602";
$Empresa_email = "printepolis@gmail.com";
$Empresa_domicilio = "Cd. Victoria, Tamaulipas";



//TEMA POR DEFECTO
$theme = "_themes/default/default.css";


//CONEXION
	//db0 = principila de huesitos
	$db0_host = 'localhost';	
	$db0_user = 'root';
	$db0_pass = 'destino'; 
	$db0_name = 'huesitos';

	if (function_exists('mysqli_connect')) {		
		$db0 = new mysqli($db0_host,$db0_user,$db0_pass,$db0_name);
		$acentos = $db0->query("SET NAMES 'utf8'"); // para los acentos
			global $db0;
			//coneccin exitorsamente
		}else{
			
			die ("Error en la conexion a la base de datos principal de huesitos");
	}

	//db1 --> Base1 de datos de tu cliente
	$db1_isset = TRUE;
	if ($db1_isset == TRUE){
	$db1_host = 'localhost';	
	$db1_user = 'root';
	$db1_pass = 'destino'; 
	$db1_name = 'ejemplo';

	if (function_exists('mysqli_connect')) {		
		$db1 = new mysqli($db1_host,$db1_user,$db1_pass,$db1_name);
		$acentos1 = $db1->query("SET NAMES 'utf8'"); // para los acentos
			global $db1;
			//coneccin exitorsamente
		}else{
			
			die ("Error en la conexion a la base de datos db1:".$db1_name);
	}
	}
?>