<?php include_once("conexion.php"); 
    
	$codigo	= $_POST['txtcodigo'];
    $nombre	= $_POST['txtnombre'];
    $idproducto 	= $_POST['txtidproducto'];
	$metododepago 	= $_POST['txtmdp'];
	$valortotal 	= $_POST['txtvalortotal'];
    
	mysqli_query($conn, "INSERT INTO clientes(codigo,nombre,idproducto,valortotal,metododepago) VALUES('$codigo','$nombre','$idproducto','$valortotal','$metododepago')");

header("Location:index.php");
	

?>