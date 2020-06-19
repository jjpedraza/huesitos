
<footer>
<?php

if (isset($_GET['home'])){
    echo "<table width=100%>";
    echo "<tr>";
    echo "<td width=20px>"."<img src='icons/user.png' style='width:20px'></td>"; 
    echo "<td>";
    echo "<b>".UserName($IdUser)."</b>";
    echo "</td>";
    echo "<td align=right>";
    echo "<a href='logout.php' title='Haga clic aqui para Cerrar Cesion'>";
    echo "<img src='icons/salir.png' style='width:50px;'>";
    // echo "<b>Cerrar Sesión</b>";
    echo "</a>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {

}

?>


</footer>


<?php
echo '

<script src="'.$dir.'lib/popper.min.js"></script>
<script src="'.$dir.'lib/jquery-3.5.1.slim.min.js.min.js"></script>
<script src="'.$dir.'lib/bootstrap/js/bootstrap.min.js"></script>';

?>

</body>
</html>