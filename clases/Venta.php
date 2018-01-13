<?php 

class Venta
{


function lista()
{
try {
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT * FROM venta
                ";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}
}


function resumen()
{
try {
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT cliente,sum(monto)monto FROM venta
                GROUP BY cliente";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}
}



}




 ?>