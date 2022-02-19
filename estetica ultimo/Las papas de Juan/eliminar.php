<?php
include_once("conexion.php");
 
$codigo = $_GET['codigo'];
 
mysqli_query($conn, "DELETE FROM clientes WHERE codigo=$codigo") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:index.php");

?>