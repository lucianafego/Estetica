<?php
include_once("conexion.php"); 
?>
<!DOCTYPE html>
<html>
<head>    
		<title>Estetica 7°1°</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="Style.css">
</head>
<body>
    <table>
    	
	
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		<a href="calendario/index.php">Turnos</a>
		</form>
		</div>
			<tr><th colspan="5"><h1>Gena Estetica Usuarios</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>Nro</th>
			<th>Código</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryclientes = mysqli_query($conn, "SELECT id_cliente,nombre,apellido,email,telefono FROM usuarios where nombre like '".$buscar."%'");
}
else
{
$queryclientes = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY id_cliente asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryclientes)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_cliente']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['apellido']."</td>";    
            echo "<td>".$mostrar['email']."</td>";
			echo "<td>".$mostrar['telefono']."</td>";  
            echo "<td style='width:26%'>
            <a href=\"editar.php?id_cliente=$mostrar[id_cliente]\">Modificar</a> | <a href=\"eliminar.php?id_cliente=$mostrar[id_cliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
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
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="txtapellido" required></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" name="txtemail" required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="text" name="txttelefono" required></td>
            </tr>
            <tr> 	
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

