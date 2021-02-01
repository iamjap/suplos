<?php
function conexion(){
	
$conexion = mysqli_connect( "localhost", "root", "" ) or die ("No se ha podido conectar al servidor de Base de datos");

$db = mysqli_select_db($conexion, "Intelcost_bienes");	
mysqli_set_charset($conexion,"utf8");

return $conexion;
}

?>