<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($login,$clave){
	$sql="INSERT INTO seguidor (nombre,clave) VALUES ('$login','$clave')";
	$idusuarionew=ejecutarConsulta_retornarID($sql);
	return $idusuarionew;
}

public function editar($login,$clave){
	$sql="UPDATE seguidor SET clave='$clave' WHERE nombre='$login'";
	return ejecutarConsulta($sql);
}

public function verificar($login,$clave){
    	$sql="SELECT id FROM seguidor WHERE nombre='$login' AND clave='$clave'"; 
    	return ejecutarConsulta($sql);

}
}
 ?>
