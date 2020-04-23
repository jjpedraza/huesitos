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

?>