<?php
require("../config.php");
require("../components.php");

$q = $_GET['q']; if (ValidaVAR($q)==TRUE){$txtUser = LimpiarVAR($q);} else {$q = "";}
$sql = "select * from wallpaper where Descripcion like '%".$q."%' order by RAND() limit 1";
// echo $sql;
$Archivo = "";
$r= $db0 -> query($sql); if($f = $r -> fetch_array()){
    $Archivo = $f['Archivo'];
}else{

}

if ($Archivo <> ''){
    // echo $Archivo;
} else {
    // echo "Default.jpg";
    $Archivo = "Default.jpg";
}

$Archivo = "img/".$Archivo;
header ("Content-type: image/jpeg");
$image = imagecreatefromjpeg($Archivo);
readfile($Archivo, "image/jpeg");
// imagejpg($image);

?>