<!DOCTYPE html>
<?php
include_once("conexion.php"); 
?>

<html>
<head>    
		<title>Las Papas de Juan</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body background="PapasSimples.png">
    <table>
	<img src="Logo.png">
      <center><a href="pag1.html" class="w3-bar-item w3-button w3-padding-large w3-white">Página principal</a></center>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar codigo del cliente">
		</form>
		</div>
			<tr><th colspan="5"><h1>Las papas de Juan </h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
			<th>Código</th>
            <th>Nombre</th>
            <th>Combo</th>
            <th>Valor total</th>
            <th>Metodo de pago</th>
            <th>Modificar o eliminar</th>
			</tr>
        <?php

          if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryclientes = mysqli_query($conn, "SELECT codigo,nombre,idproducto,metododepago,valortotal FROM clientes where codigo like '".$buscar."%'");
}
else
{
$queryclientes = mysqli_query($conn, "SELECT * FROM clientes ORDER BY codigo asc");
}
		$codigo = 0;
        while($mostrar = mysqli_fetch_array($queryclientes)) 
		{    $codigo++;    
            echo "<tr>";
            echo "<td>".$mostrar['codigo']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";    
			echo "<td>".$mostrar['idproducto']."</td>";
            echo "<td>".$mostrar['valortotal']."</td>";
			echo "<td>".$mostrar['metododepago']."</td>";
			echo "<td style='width:50%'>
            
            <a href=\"editar.php?codigo=$mostrar[codigo]\">Modificar</a>
             | 
             <a href=\"eliminar.php?codigo=$mostrar[codigo]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar/Cancelar</a>
             | 
             <a href=\"eliminar.php?codigo=$mostrar[codigo]\" onClick=\"return confirm('¿Estás seguro de entregar el pedido de $mostrar[nombre]?')\">Entregar pedido</a></td>";  
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo pedido</th></tr>

            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Combo</td>
                <td><input type="number_format" name="txtidproducto" required></td>
            </tr>
            <tr> 
                <td>Valor Total</td>
                <td><input type="number_format" name="txtvalortotal" required></td>
            </tr>
            <tr> 
			</tr>
            <tr>
                <form>
            <td>Metodo de Pago</td>
            <td>        
                <select name ="txtmdp">
        <option value="Tarjeta">Tarjeta</option>
        <option value="Efectivo">Efectivo</option>
    </select>
        </td>
    </form>
</tr>
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>