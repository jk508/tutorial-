<?php 
session_start();
require_once "../modelos/Usuario.php";

$usuario=new Usuario();


switch ($_GET["op"]) {

    case 'insertar':
        $logina=$_POST['logina'];
		$clavea=$_POST['clavea'];

		//Hash SHA256 para la contraseña
		$clavehash=hash("SHA256", $clavea);

	
			$rspta=$usuario->insertar($logina,$clavehash);
		//	echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar todos los datos del usuario";
		
		
		break;

    case 'editar':
        $logina=$_POST['logina'];
		$clavea=$_POST['clavea'];

		//Hash SHA256 para la contraseña
		$clavehash=hash("SHA256", $clave);

	
			$rspta=$usuario->editar($login,$clavehash);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	
	break;


    case 'verificar':
		//validar si el usuario tiene acceso al sistema
		$logina=$_POST['logina'];
		$clavea=$_POST['clavea'];

		//Hash SHA256 en la contraseña
		$clavehash=hash("SHA256", $clavea);
	
		$rspta=$usuario->verificar($logina, $clavehash);

		$fetch=$rspta->fetch_object();
        if (isset($fetch)) 
		{
			# Declaramos la variables de sesion
			$_SESSION['id']=$fetch->id;
        }
	
		echo json_encode($fetch);
	break;
    }
?>