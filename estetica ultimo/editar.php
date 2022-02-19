<?php 
include_once("conexion.php");
include_once("index.php");

$codigo = $_GET['id_cliente'];
 
$queryclientes = mysqli_query($conn, "SELECT * FROM clientes WHERE $codigo=id_cliente");
 
while($mostrar = mysqli_fetch_array($queryclientes))
{
    $codigo = $mostrar['id_cliente'];
    $nombre = $mostrar['nombre'];
    $apellido = $mostrar['apellido'];
    $email = $mostrar['email'];
	$telefono = $mostrar['telefono'];
}
?>
<html>
<head>    
		<title>t4</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="Style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="txtapellido" value="<?php echo $apellido;?>" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="email" name="txtemail" value="<?php echo $email;?>" required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="text" name="txttelefono" value="<?php echo $telefono;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="index.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $id_cliente = $_POST['txtid_cliente'];
	$nombre 	= $_POST['txtnombre'];
    $apellido    = $_POST['txtapellido'];
    $email 	= $_POST['txtemail'];
    $telefono 	= $_POST['txttelefono']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE clientes SET nombre='$nombre',apellido='$apellido,'email='$email',telefono='$telefono' WHERE id_cliente=$id_cliente");

  	echo "<script>window.location= 'index.php' </script>";
    
}
?>
	