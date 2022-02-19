<?php
    
    include 'config.php'; 

    include 'funciones.php';

    $id  = evaluar($_GET['id']);

    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");

    $row = $bd->fetch_assoc();

    $titulo=$row['title'];

    $evento=$row['body'];

    $inicio=$row['inicio_normal'];

    $final=$row['final_normal'];

if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
	   <meta charset="UTF-8">
	   <title><?=$titulo?></title>
    </head>
    <body>
        <h3><?=$titulo?></h3>
        <hr>
        <b>Fecha inicio:</b> <?=$inicio?>
        <b>Fecha termino:</b> <?=$final?>
        <p><?=$evento?></p>
    </body>
    <form action="" method="post">
        <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
    </form>
</html>
