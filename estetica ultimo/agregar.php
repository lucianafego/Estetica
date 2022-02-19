<?php include_once("conexion.php"); 
    
	$nombre 	= $_POST['txtnombre'];
	$apellido 	= $_POST['txtapellido'];
    $email 	= $_POST['txtemail'];
    $telefono 	= $_POST['txttelefono'];
    
	mysqli_query($conn, "INSERT INTO clientes(nombre,apellido,email,telefono) VALUES('$nombre','$apellido','$email','$telefono')");
    
header("Location:index.php");
	

?>
