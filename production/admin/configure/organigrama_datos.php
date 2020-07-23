<?php
require("../config.php");
require("../components.php");

//Validar Token

if (isset($_POST['IdUser']) and isset($_POST['IdApp'])){
    $IdUser = LimpiaVariable($_POST['IdUser']); 
    $IdApp = LimpiaVariable($_POST['IdApp']); 
    $MiToken = MiToken($IdUser, $IdApp); //Creamos Token al inciiar la app

    if (MiToken_valida($MiToken, $IdUser, $IdApp)==TRUE){



        
        $tbl = ""; 
        $sql="select * from lista_organigrama";
        $r= $db0 -> query($sql);
        $tbl = $tbl. "<table class='tabla'>";
        $tbl = $tbl. "<th>IdDpto</th>";
        $tbl = $tbl. "<th>Dependencia</th>";
        $tbl = $tbl. "<th>Departamento</th>";
        $tbl = $tbl. "<th>DptoNivel</th>";
        $tbl = $tbl. "<th>Titular</th>";
        
        $G = '
            
                <ul>';

        while($f = $r -> fetch_array()) {
            $tbl = $tbl. "<tr>";
            $tbl = $tbl. "<td>".$f['IdDpto']."</td>";
            $tbl = $tbl. "<td>".$f['Dependencia']."</td>";
            $tbl = $tbl. "<td>".$f['Departamento']."</td>";
            $tbl = $tbl. "<td>".$f['IdDptoNivel']."</td>";
            $tbl = $tbl. "<td>".$f['Titular']."</td>";


            $tbl = $tbl. "</tr>";

            if ($f['Dependencia'] == ''){// Nivel 1                
                $G = $G.'<li>';
                $G = $G.'';
                $G = $G.'<a href="?x=&IdDpto='.$f['IdDpto'].'">'.$f['Departamento'].'</a>';
                $G = $G.'';
                   
                    //Nivel 2
                    $sql2="select * from lista_organigrama where IdDependencia='".$f['IdDpto']."' and IdDpto <> '".$f['IdDpto']."'";                    
                    $r2= $db0 -> query($sql2);
                    $G = $G.'<ul>';
                    while($f2 = $r2 -> fetch_array()) {                    
                        $G = $G.'<li><a href="?x=&IdDpto='.$f2['IdDpto'].'">'.$f2['Departamento']."</a>";

                                //Nivel 3
                            $sql3="select * from lista_organigrama where IdDependencia='".$f2['IdDpto']."' and IdDpto <> '".$f2['IdDpto']."'";                    
                            $r3= $db0 -> query($sql3);
                            $G = $G.'<ul>';
                            while($f3 = $r3 -> fetch_array()) {                    
                                $G = $G.'<li><a href="?x=&IdDpto='.$f3['IdDpto'].'">'.$f3['Departamento']."</a>";


                                                //Nivel 4
                                        $sql4="select * from lista_organigrama where IdDependencia='".$f3['IdDpto']."' and IdDpto <> '".$f3['IdDpto']."'";                    
                                        $r4= $db0 -> query($sql4);
                                        $G = $G.'<ul>';
                                        while($f4 = $r4 -> fetch_array()) {                    
                                            $G = $G.'<li><a href="">'.$f4['Departamento']."</a>";
                                            $G = $G.'</li>';                    
                                        }
                                        $G = $G.'</ul>';


                                $G = $G.'</li>';                    
                            }
                            $G = $G.'</ul>';
                        $G = $G.'</li>';                    
                    }
                    $G = $G.'</ul>';

                $G = $G.'</li>';

            }

                    
            
            
        }
        $tbl = $tbl. "</table>";

        echo '<div class="organigrama">'.$G.'</ul>'.'</div>';
        echo '<br><br><div id="listaOrganigrama">'.$G.'</ul>'.'</div>';

        // echo $G;
        // echo $tbl;   



    } else {
        echo "Token invalido: ".$MiToken;
    }
}
else {
    echo  "Parametros incompletos";
}


?>