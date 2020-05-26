<?php



//CLIENTE
$Empresa = "PrymeCode";
$Empresa_title = "PrymeCode :)";
$Empresa_website = "https://prymecode.com";
$Empresa_tels = "8343088602";
$Empresa_email = "printepolis@gmail.com";
$Empresa_domicilio = "Cd. Victoria, Tamaulipas";



//TEMA POR DEFECTO
$theme = "themes/default/default.css";


//CONEXION
	//db0 = principila de huesitos
	$db0_host = 'localhost';	
	$db0_user = 'root';
	$db0_pass = '3l-1t4vu'; 
	$db0_name = 'huesitos';

	if (function_exists('mysqli_connect')) {		
		$db0 = new mysqli($db0_host,$db0_user,$db0_pass,$db0_name);
		$acentos = $db0->query("SET NAMES 'utf8'"); // para los acentos
			global $db0;
			//coneccin exitorsamente
		}else{
			
			die ("Error en la conexion a la base de datos principal de huesitos");
	}


	//=========================== E m p r e s a  C l i e n t e ==========================================
	$IdEmpresa = 0; //de la Tabla Empresa, este define los parametros 

	$EmpresaSQL="select * from Empresa where IdEmpresa='".$IdEmpresa."'";
	$EmpresaR = $db0 -> query($EmpresaSQL); 	
	while($Empresa = $EmpresaR -> fetch_array())
    {//Datos del Registro de la Empresa

		$LogoFile = $Empresa['Logotipo_url'];
		$EmpresaNombre = $Empresa['Nombre'];
		$EmpresaDescripcion = $Empresa['Descripcion'];
		
		
		//Activar bases de datos del cliente
		if ($Empresa['bd1']==1){ // Base 1			
		
			if (function_exists('mysqli_connect')) {		
				$db1 = new mysqli($Empresa['bd1_host'],$Empresa['bd1_user'],$Empresa['bd1_pass'],$Empresa['bd1_name']);				
				$acentos1 = $db1->query("SET NAMES 'utf8'"); global $db1;					
			}	else	{	die ("Error en la conexion a la base de datos db1:".$db1_name); 	}

		} else {
			echo "<div class='ERROR'>ERROR: Sin base(1) de datos configurada.</div>";
		}


		if ($Empresa['bd2']==1){ // Base 1			
		
			if (function_exists('mysqli_connect')) {		
				$db2 = new mysqli($Empresa['bd2_host'],$Empresa['bd2_user'],$Empresa['bd2_pass'],$Empresa['bd2_name']);				
				$acentos1 = $db2->query("SET NAMES 'utf8'"); global $db2;					
			}	else	{	die ("Error en la conexion a la base de datos db2:".$db1_name); 	}

		} else {
			// echo "<div class='ERROR'>ERROR: Sin base(2) de datos configurada.</div>";
		}

		if ($Empresa['bd3']==1){ // Base 1			
		
			if (function_exists('mysqli_connect')) {		
				$db3 = new mysqli($Empresa['bd3_host'],$Empresa['bd3_user'],$Empresa['bd3_pass'],$Empresa['bd3_name']);				
				$acentos1 = $db3->query("SET NAMES 'utf8'"); global $db1;					
			}	else	{	die ("Error en la conexion a la base de datos db3:".$db1_name); 	}

		} else {
			// echo "<div class='ERROR'>ERROR: Sin base(3) de datos configurada.</div>";
		}


	}
	
	
	
	$fecha = date('Y-m-d');
	$hora =  date ("H:i:s");

	$SesionName="Hu3s1t05";
	

	

?>