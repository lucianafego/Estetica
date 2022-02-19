<?php
include_once("conexion.php");
 
$id_cliente = $_GET['id_cliente'];
 
mysqli_query($conn, "DELETE FROM clientes WHERE id_cliente=$id_cliente") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:index.php");

?>