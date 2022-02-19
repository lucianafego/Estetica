<?php 
include_once("conexion.php");
include_once("index.php");

$codigo = $_GET['codigo'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM clientes WHERE codigo=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['codigo'];
    $nombre = $mostrar['nombre'];
    $idproducto= $mostrar['idproducto'];
    $metododepago = $mostrar ['metododepago'];
	$valortotal = $mostrar['valortotal'];
}
?>
<html>
<head>    
		<title>t4</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Combo</td>
                <td><input type="number"name="txtidproducto" value="<?php echo $idproducto;?>" required></td>
            </tr>
                         <tr>    
                <td>Valor Total</td>
                <td><input type="number_format" name="txtvalortotal" value="<?php echo $valortotal;?>"required></td>  
      </tr>
            <tr>
              
            <td>Metodo de Pago</td>
            <td>
        <select name ="txtmdp">
        <option value="Tarjeta">Tarjeta</option>
        <option value="Efectivo">Efectivo</option>
    </select>
             </tr>
            <form>
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

	
	$nombre 	= $_POST['txtnombre'];
    $idproducto	= $_POST['txtidproducto'];
    $valortotal	= $_POST['txtvalortotal'];
    $metododepago = $_POST['txtmdp'];
	
      
    $querymodificar = mysqli_query($conn, "UPDATE clientes SET codigo='$codigo',nombre='$nombre',valortotal='$valortotal',idproducto=$idproducto,metododepago='$metododepago' WHERE codigo=$codigo");

  	echo "<script>window.location= 'index.php' </script>";
    
}
?>