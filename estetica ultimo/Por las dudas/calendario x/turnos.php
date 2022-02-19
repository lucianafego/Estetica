<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql: dbname=sistema;host=127.0.0.1", "root","");

$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
switch ($accion) {
	case 'agregar':
		//Instruccion de agregado
	    $sentenciaSQL = $pdo->prepare(" INSERT INTO 
	    	eventos(title,descripcion,color,textColor,start,fin)
	    	VALUES(:title,:descripcion,:color,:textColor,:start,:fin)")
        $respuesta=$sentenciaSQL->execute(array(
        	"title"=>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=> $_POST['start'],
            "fin"=> $_POST['fin']

        ));

        echo json_encode($respuesta);

		break;
	case 'eliminar':
	    //Instruccion de eliminar
	    //echo "Instrucción eliminar";

	    $respuesta=false;
	    if(isset($_POST['id'])){
	    	$sentenciaSQL = $pdo->prepare("DELETE FROM eventos WHERE ID=:ID");
	    	$respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['id']));
	    }
	    echo json_encode($respuesta);
		
		break;
	case 'modificar':
	    //Instruccion de modificar
	    echo "Instrucción modificar";
		
		break;
	
	default:
	//Seleccionar los eventos del calendario
	$sentenciaSQL= $pdo->prepare ("SELECT * FROM resreva_turnos");
    $sentenciaSQL -> execute();

    $resultado= $sentenciaSQL -> fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
		
		break;
}


?>
