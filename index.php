<?php include ("_main/head.php");?>
<?php include ("_main/menu.php");?>

<?php

?>

<?php

$IdUser = "Admin"; //Variable de ambiente, utilizada en el loggin
$Token = "0"; //Secuencia aleatoria para identificacion
$Gtype = 0; //Tipo de Grafica
$File = 0; // 0 = no genera archivo jpg (solo en pantalla), 1 = genera archivo
$Values = array(40, 13, 50 ); //Array para almacenar los valores de la Grafica
$LabelData = array(40, 13, 50); //Array para los valores LAbel
$Labels = array("Frijol", "Maiz", "Sorgo"); // Etiquetas para la Grafica
GenerarGrafica($IdUser, $Token, $Gtype, $File, $Values, $LabelData, $Labels); 
	
?>

<?php include ("_main/footer.php");?>