<?php 
session_start();
require_once "../modelos/Tarea.php";

$tarea=new Tarea();


switch ($_GET["op"]) {

    case 'insertar':
        $tarea_1=$_POST['tarea'];
		$instruciones=$_POST['instrucciones'];

		$rspta=$tarea->insertar($tarea_1,$instruciones);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar todos los datos del usuario";
		
		
	break;

	case 'puntaje':
        $id=$_POST['id'];
		$puntaje=$_POST['puntaje'];

		$rspta=$tarea->calificar($id,$puntaje);
		echo $rspta;
		
		
	break;

	case 'buscar':
        $palabra=$_POST['palabra'];
	

		$rspta=$tarea->buscar($palabra);
		echo $rspta['id'];
		
	break;

	case 'mostrar':
		$id=$_POST['id'];
	
		$rspta=$tarea->mostrar($id);
		echo json_encode($rspta);
		break;

    }
?>