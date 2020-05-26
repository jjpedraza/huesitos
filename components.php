<?php

function Test(){
    echo "<hr>Botones:<br><br><br>";
    echo "<buttom class='btn btn-Default'>Default</buttom> ";
    echo "<buttom class='btn btn-Primary'>Primary</buttom> ";
    echo "<buttom class='btn btn-Secondary'>Secondary</buttom> ";
    echo "<buttom class='btn btn-Success'>Success</buttom> ";
    echo "<buttom class='btn btn-Warning'>Warning</buttom> ";
    echo "<buttom class='btn btn-Danger'>Danger</buttom> ";


    echo "<hr>Formulario:<br><br><br>";  
    echo "<form>";
    echo "<label>Dato 1: <input type='text'></label>";
    echo "<label>Dato 2: <input type='number'></label>";
    echo "<label>Dato 3: <input type='date'></label>";
    echo "<label style=''>Dato 4: <input type='mail'></label>";
    echo "<label style='background-color:transparent;'><input class='btn btn-Primary' type='submit' value='Enviar'></label>";
    echo "</form>";

    toast("Ejemplo de Notificacion Toas",1,"");

}



function DynamicTable_MySQL($sql, $IdDiv, $IdTabla, $Clase, $Tipo, $db){
	//Tipo == 0 = Basica, 1 = ScrollVertical, 2 = Scroll Horizontal
	//$sql = "select * from Colorines limit 20";
	//DynamicTable_MySQL($sql, "Colorines", "Colorines_Tabla", "Colorines_ClaseCSS", 0, 0);

	require("config.php");
	
	if ($db == 0){
        $r= $db0 -> query($sql);
        $tbCont = '<div id="'.$IdDiv.'" class="'.$Clase.'">
        <table id="'.$IdTabla.'" class="display" style="width:100%" class="tabla" style="font-size:8pt;">';
    $tabla_titulos = ""; $cuantas_columnas = 0;
        $r2 = $db0 -> query($sql); while($finfo = $r2->fetch_field())
        {//OBTENER LAS COLUMNAS

                /* obtener posición del puntero de campo */
                $currentfield = $r2->current_field;       
                $tabla_titulos=$tabla_titulos."<th style='text-transform:uppercase; font-size:9pt;'>".$finfo->name."</th>";
                $cuantas_columnas = $cuantas_columnas + 1;        
        }

        $tbCont = $tbCont."  
        <thead>
        <tr>
            ".$tabla_titulos."  
        </tr>
        </thead>"; //Encabezados
        $tbCont = $tbCont."<tbody class='tabla'>";
        $cuantas_filas=0;
        $r = $db0 -> query($sql); while($f = $r-> fetch_row())
        {//LISTAR COLUMNAS

            $tbCont = $tbCont."<tr>";        
            for ($i = 1; $i <= $cuantas_columnas; $i++) {      
                $tbCont = $tbCont."<td style='font-size:10pt;'>".$f[$i-1]."</td>";       
                }

            $tbCont = $tbCont."</tr>";
            $cuantas_filas = $cuantas_filas + 1;        
        }

        $tbCont = $tbCont."</tbody>";
        $tbCont = $tbCont."</table></div>";
	

    }






	if ($db == 1){

        $r1= $db1 -> query($sql);
        $tbCont = '<div id="'.$IdDiv.'" class="'.$Clase.'">
        <table id="'.$IdTabla.'" class="display" style="width:100%" class="tabla" style="font-size:8pt;">';
    $tabla_titulos = ""; $cuantas_columnas = 0;
        $r1_1 = $db1 -> query($sql); while($finfo = $r1_1->fetch_field())
        {//OBTENER LAS COLUMNAS

                /* obtener posición del puntero de campo */
                $currentfield = $r1_1->current_field;       
                $tabla_titulos=$tabla_titulos."<th style='text-transform:uppercase; font-size:9pt;'>".$finfo->name."</th>";
                $cuantas_columnas = $cuantas_columnas + 1;        
        }

        $tbCont = $tbCont."  
        <thead>
        <tr>
            ".$tabla_titulos."  
        </tr>
        </thead>"; //Encabezados
        $tbCont = $tbCont."<tbody class='tabla'>";
        $cuantas_filas=0;
        $r1 = $db1 -> query($sql); while($f1 = $r1-> fetch_row())
        {//LISTAR COLUMNAS

            $tbCont = $tbCont."<tr>";        
            for ($i = 1; $i <= $cuantas_columnas; $i++) {      
                $tbCont = $tbCont."<td style='font-size:10pt;'>".$f1[$i-1]."</td>";       
                }

            $tbCont = $tbCont."</tr>";
            $cuantas_filas = $cuantas_filas + 1;        
        }

        $tbCont = $tbCont."</tbody>";
        $tbCont = $tbCont."</table></div>";
	

    }


    if ($db == 0 OR $db==1){
	echo  $tbCont;
		switch ($Tipo) {
			case 1: //Scroll Vertical
					echo '<script>
					$(document).ready(function() {
						$("#'.$IdTabla.'").DataTable( {
							"scrollY":        "200px",
							"scrollCollapse": true,
							"paging":         false,
							"language": {
								"decimal": ",",
								"thousands": "."
							}
						} );
					} );
					</script>';
				break;

			case 2: //Scroll Horizontal
					echo '<script>
					$(document).ready(function() {
						$("#'.$IdTabla.'").DataTable( {
							"scrollX": true,
							"scrollCollapse": true,
							"paging":         true,
							"language": {
								"decimal": ",",
								"thousands": "."
							}
						} );
					} );
					</script>';
				break;
			
			default:
				echo '<script>
				$(document).ready(function() {
					$("#'.$IdTabla.'").DataTable( {
						"language": {
							"decimal": ",",
							"thousands": "."
						}
					} );
				} );
				</script>';
		}
    } else {
    	echo "Error: no se ha seleccionado una db para la Tabla Dinamica";
    }

}





function Toast($Texto,$Tipo,$img){
    switch ($Tipo) {
        case 0:
            echo "<script>";
                echo "$.toast('".$Texto."');   ";
            echo "</script>";
            break;
        case 1: //Informativo
            echo "<script>";
            echo "
            $.toast({
                heading: 'Information',
                text: '".$Texto."',
                showHideTransition: 'slide',
                icon: 'info'
            })
            ";
            echo "</script>";
            break;
       
        case 2: //Error
            echo "<script>";
            echo "
            $.toast({
                heading: 'Error',
                text: '".$Texto."',
                showHideTransition: 'slide',
                icon: 'error'
            })
            ";
            echo "</script>";
            break;

        case 3: //Warning
                echo "<script>";
                echo "
                $.toast({
                    heading: 'Warning',
                    text: '".$Texto."',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
                ";
                echo "</script>";
                break;

                

        case 4: //Success
            echo "<script>";
            echo "
            $.toast({
                heading: 'Success',
                text: '".$Texto."',
                showHideTransition: 'slide',
                icon: 'success'
            })
            ";
            echo "</script>";
            break;
    

        case 5: //fijo
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '".$Texto."',                
                hideAfter: false
                
            })
            ";
            echo "</script>";
            break;
        
        case 6: //imagen normal
                echo "<script>";
                echo "
                $.toast({
                    heading: '',
                    text: '".$Texto."<img style=width:100% src=".$img.">"."',                
                    hideAfter: false
                    
                })
                ";
                echo "</script>";
        break;                


        case 7: //imagen sucess
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '".$Texto."<img style=width:100% src=".$img.">"."',                
                hideAfter: false,
                icon:'success'
                
            })
            ";
            echo "</script>";
        break;                


        case 8: //imagen warning
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '".$Texto."<img style=width:100% src=".$img.">"."',                
                hideAfter: false,
                icon:'warning'
                
            })
            ";
            echo "</script>";
        break;                

        case 9: //imagen error
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '".$Texto."<img style=width:100% src=".$img.">"."',                
                hideAfter: false,
                icon:'error'
                
            })
            ";
            echo "</script>";
        break;                

        case 10: //imagen normal auto
            echo "<script>";
            echo "
            $.toast({
                heading: '',
                text: '".$Texto."<img style=width:100% src=".$img.">"."',                
                showHideTransition: 'slide'
                
            })
            ";
            echo "</script>";
    break;                


    case 11: //imagen sucess auto
        echo "<script>";
        echo "
        $.toast({
            heading: '',
            text: '".$Texto."<img style=width:100% src=".$img.">"."',                
            
            icon:'success',
            showHideTransition: 'slide'
            
        })
        ";
        echo "</script>";
    break;                


    case 12: //imagen warning auto
        echo "<script>";
        echo "
        $.toast({
            heading: '',
            text: '".$Texto."<img style=width:100% src=".$img.">"."',                
           
            icon:'warning',
            showHideTransition: 'slide'
            
        })
        ";
        echo "</script>";
    break;                

    case 13: //imagen error auto
        echo "<script>";
        echo "
        $.toast({
            heading: '',
            text: '".$Texto."<img style=width:100% src=".$img.">"."',                
            
            icon:'error',
            showHideTransition: 'slide'
            
        })
        ";
        echo "</script>";
    break;                


        default:
           echo "<script>";
               echo "$.toast('".$Texto."');   ";
           echo "</script>";
    }
}





function GenerarGrafica($IdUser, $Token, $Gtype, $File, $Values, $LabelData, $Labels){
require("config.php");

			switch ($Gtype) {
				case 0:
											//GRAFICA PIE CHART
						require_once ("lib/jpgraph/jpgraph.php");
						require_once ("lib/jpgraph/jpgraph_pie.php");
						$data = $Values; //Array para vaalues
						$dataLabels = $LabelData;  //Valor en las etiquetas
						$labels = $Labels; //mas info
				;
						$graph = new PieGraph(2500,2500);
						$theme_class="DefaultTheme";
						$graph->title->Set($title);
						$graph->subtitle->Set($subtitle);
						$graph->SetBox(true);
						$p1 = new PiePlot($data);
						$p1->SetLabelType("PIE_VALUE_ABS");
						$graph->Add($p1);
						$p1->SetLegends($dataLabels);
						$p1->ShowBorder();
						$p1->SetColor('black');
						$p1->SetLabels($labels);
						$p1->SetGuideLines(true,false);
						$p1->SetGuideLinesAdjust(1.1);
						$p1->SetLabelPos(1);
						$p1->SetLabelType(PIE_VALUE_PER);
						$graph->legend->SetFont(FF_ARIAL,FS_NORMAL,14);
						$graph->legend->SetPos(0.5,0.97,'center','bottom');
						$graph->legend->SetMarkAbsSize (20);
						// $graph->legend-> SetColumns (2);
						$p1->value->SetFont(FF_ARIAL,FS_NORMAL,14);

						$graph->title->SetFont(FF_ARIAL,FS_NORMAL,24);
						$graph->subtitle->SetFont(FF_ARIAL,FS_NORMAL,18);

						$p1->SetSliceColors(array('#F08080','#E9967A','#DC143C','#FF69B4','#C71585','#FFA07A','#FF6347','#FF8C00','#BDB76B','#D8BFD8','#EE82EE','#BA55D3','#9966CC','#9400D3','#8B008B','#4B0082','#7CFC00','#32CD32','#90EE90','#00FF7F','#2E8B57','#008000','#9ACD32','#808000','#66CDAA','#20B2AA','#008080','#00FFFF','#AFEEEE','#40E0D0','#00CED1','#4682B4','#B0E0E6','#87CEEB','#00BFFF','#6495ED','#4169E1','#0000CD','#000080','#F5DEB3','#D2B48C','#F4A460','#B8860B','#D2691E','#A0522D','#800000','#808080','#778899','#2F4F4F'));

						if ($Fila == 1){
							$graph->Stroke("tmp/graficas/".$IdUser."_".$token.".jpg");
						} else {
							$graph->Stroke();
						}
						
					
			

				break;
			case 1:
				if ($Gsql<>''  AND $SQL_go == TRUE) {
					require_once ('jpgraph/jpgraph.php');
					require_once ('jpgraph/jpgraph_line.php');
				

					
					$datay = array();  //Array para vaalues
					$dataLabels = array();  
					$labels = array();
					// echo $Gsql;
					switch ($BD) {
						case "P": $r = $db0 -> query($Gsql);break;
						case "V": $r = $Vivienda -> query($Gsql); break;		
						default: $r = $db0 -> query($Gsql);break;	
					}
					// $r= $db0 -> query($Gsql);
					// var_dump($r);
					while($fv = $r -> fetch_array()) {//asi deben estar las consultas
						array_push ($datay, $fv['Valor']);
						array_push ($dataLabels, $fv['Label']);
						array_push ($labels, "(".$fv['Valor'].") %.1f%%");

						//Lineas
						
					
						
					}

					
					
					
					// $datay = array(0,25,12,47,27,27,0);
					
					// Setup the graph
					$graph = new Graph(2500,2500);
					$graph->SetScale("intlin",0,$aYMax=50);
					
					$theme_class= new UniversalTheme;
					$graph->SetTheme($theme_class);
					
					$graph->SetMargin(40,40,50,40);
					
					$graph->title->Set($title);
					$graph->title->SetFont(FF_ARIAL,FS_NORMAL,24);
					$graph->title->SetMargin(50);
					$graph->SetBox(true);
					$graph->yaxis->HideLine(true);
					$graph->yaxis->HideTicks(true,true);					
					
					$graph->SetBackgroundGradient('#FFFFFF', '#00FF7F', GRAD_HOR, BGRAD_PLOT);					
					
					$graph->xaxis->SetTickLabels($dataLabels);
					$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,14);
					$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,14);
					$graph->xaxis->SetLabelMargin(20);
					$graph->yaxis->SetLabelMargin(20);
					

					// $graph->SetAxisStyle(AXSTYLE_BOXOUT);
					// $graph->img->SetAngle(180); 
					
					// Create the line
					$p1 = new LinePlot($datay);
					$graph->Add($p1);
					
					$p1->SetFillGradient('#BBBBBB','#BBBBBB');
					$p1->SetColor('#BBBBBB');
					
					// Output line					
					$graph->Stroke("tmp/graficaspdf/".$nitavu."_".$id_rep."_".$token.".jpg");
				}

			
			
	
	
	
	
	}
}



// FUNCIONES PARA MEJORAR LA SEGURIDAD
function ValidaVAR($valor){
    $output = TRUE;
    $peligro = "SCRIPT"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "<"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "script"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = ">"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "SELECT"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "COPY"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "DROP"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "DUMP"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    // $peligro = "OR"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "LIKE"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "'"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "\""; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 

    return $output;
}

function LimpiarVAR($valor){
    $output = LimpiarVAR_FrontEnd($valor);
	$output = LimpiarVAR_BackEnd($valor);
	$output =  LimpiarComillas($valor);
    return $output;
}

        

function LimpiarComillas($valor)
{
	
	$valor = addslashes($valor);     
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	
	
	return $valor;
}


    function LimpiarVAR_BackEnd($valor)
    {
        
        $valor = addslashes($valor);     
        $valor = str_ireplace("SELECT","",$valor);
        $valor = str_ireplace("COPY","",$valor);
        $valor = str_ireplace("DELETE","",$valor);
        $valor = str_ireplace("DROP","",$valor);
        $valor = str_ireplace("DUMP","",$valor);
        // $valor = str_ireplace(" OR ","",$valor);
        $valor = str_ireplace("%","",$valor);
        $valor = str_ireplace("LIKE","",$valor);
        $valor = str_ireplace("--","",$valor);
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor);	
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("¡","",$valor);
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("<SCRIPT>","",$valor);
        $valor = str_ireplace("<script>","",$valor);
        $valor = str_ireplace(">","",$valor);
        $valor = str_ireplace("<","",$valor);
        
        return $valor;
    }

   
    function LimpiarVAR_FrontEnd($input) {
     
      $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
        '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
      );
     
        $output = preg_replace($search, '', $input);
        return $output;
      }
     
    function sanitize($input) {
        if (is_array($input)) {
            foreach($input as $var=>$val) {
                $output[$var] = sanitize($val);
            }
        }
        else {
            if (get_magic_quotes_gpc()) {
                $input = stripslashes($input);
            }
            $input  = cleanInput($input);
            $output = mysql_real_escape_string($input);
        }
        return $output;
	}
	



    function SESSION_init($id, $user, $session_name, $session_comentario, $ip){
        require("config.php");	
        $sql = "INSERT INTO sessiones (id, session_name,  usuario, fecha, hora, comentarios,ipcliente) 
        VALUES ('".$id."', '".$session_name."', '".$user."', '".$fecha."', '".$hora."', '".$session_comentario."', '".$ip."')";
        // mensaje($sql,'login.php');
            if ($db0->query($sql) == TRUE)
                {return TRUE;}
            else {return FALSE;}
    }
    
    
    function SESSION_close($id){
        require("config.php");
        $sql="UPDATE sessiones  SET cierre_fecha='".$fecha."', cierre_hora='".$hora."'  WHERE id='".$id."'";
        // //echo $sql;
        if ($db0->query($sql) == TRUE)
            {return TRUE;}
        else {return FALSE;}
    }
    
    
    function SESSION_tiempo($id){
        require("config.php");
        $sql = 'SELECT TIMEDIFF(CURTIME(), hora) as transcurrido, sessiones.* from sessiones where id="'.$id.'"' ;
        // //echo $sql;
        $r= $db0 -> query($sql); if($f = $r -> fetch_array()){
                return $f['transcurrido'];
        }else{
                return FALSE;
        }
            
    
    }
    
    
    
    function SESSION_tiempoRound($id){
        require("config.php");
        $sql = 'SELECT ROUND(TIMEDIFF(CURTIME(), hora)) as transcurrido, sessiones.* from sessiones where id="'.$id.'"' ;
        // //echo $sql;
        $r= $db0 -> query($sql); if($f = $r -> fetch_array()){
                return $f['transcurrido'];
        }else{
                return FALSE;
        }
            
    
    }
    


    function InfoEquipo()
    {
        $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
        $os=array("WIN","MAC","LINUX");
        # definimos unos valores por defecto para el navegador y el sistema operativo
        $info['browser'] = "OTHER";
        $info['os'] = "OTHER";
        # buscamos el navegador con su sistema operativo
        foreach($browser as $parent)
        {
        $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
        $f = $s + strlen($parent);
        $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
        $version = preg_replace('/[^0-9,.]/','',$version);
        if ($s)
        {
        $info['browser'] = $parent;
        $info['version'] = $version;
        
        }
        }
        # obtenemos el sistema operativo
        foreach($os as $val)
        {
        if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
        $info['os'] = $val;
        }
        # devolvemos el array de valores
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
          } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
          } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
          } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
          } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
          } else {
            // Método por defecto de obtener la IP del usuario
            // Si se utiliza un proxy, esto nos daría la IP del proxy
            // y no la IP real del usuario.
            $ip = $_SERVER['REMOTE_ADDR'];
          }
        //echo getenv('HTTP_CLIENT_IP');
        //echo getenv('HTTP_X_FORWADED_FOR');
        //echo getenv('REMOTE_ADDR');
        $infofull="";
        //$infofull = $infofull. "Usuario: ".gethostname()."<br>";
        $infofull = $infofull. "SO:".$info['os'].",";
        $infofull = $infofull. "Navegador: ".$info['browser'].",";
        $infofull = $infofull. "Version:".$info['version']."";
        // $infofull = $infofull. "".$_SERVER['HTTP_USER_AGENT']."<br>";
        
        $red = "";
        // if ($ip <> '' ){$red = $red."ip:".$ip;	}
        if (strlen(getenv('HTTP_CLIENT_IP')) > 3 ){$red = $red." ".getenv('HTTP_CLIENT_IP');}
        if (strlen(getenv('HTTP_X_FORWADED_FOR')) > 3 ){$red = $red.", ".getenv('HTTP_X_FORWADED_FOR');}
        if (strlen(getenv('REMOTE_ADDR')) > 3 ){$red = $red.", ".getenv('REMOTE_ADDR');}
    
        if ($red <> ''){
            $infofull = $infofull.", Red: (".$red.")";
        }
        
        
        
        
        return $infofull;
    }
?>