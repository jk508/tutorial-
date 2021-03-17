<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Tarea{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($tarea,$instrucciones,$seguidor){
	$sql="INSERT INTO tarea (idseguidor,nombre,instrucciones,fecha) VALUES ('$seguidor','$tarea','$instrucciones',NOW())";
	$idnew=ejecutarConsulta_retornarID($sql);
	return $idnew;
}

public function tutoriales($palabra){
	if($palabra!=null){
		$palabra="WHERE id='$palabra'";  
	}
	else $palabra="";
	$sql="SELECT * FROM tarea ".$palabra;
	return ejecutarConsulta($sql); 
}



public function calificar($id,$puntaje){
	$sql="SELECT sum(puntuacion) as suma FROM tarea WHERE id='$id'";
	$p=ejecutarConsultaSimpleFila($sql); 
	if($puntaje=="+1"){
	$total=$p['suma']+1;}
	else $total=$p['suma']-1;
	$sql="UPDATE tarea SET puntuacion='$total' WHERE id='$id'";
	return ejecutarConsulta($sql);
}

public function buscar($palabra){
	$sql="SELECT id FROM tarea WHERE nombre like '%$palabra%'";
	$p['id']=ejecutarConsultaSimpleFila($sql);
	return $id= $p['id'];
	
}

public function editar($login,$clave){
	$sql="UPDATE tarea SET clave='$clave' WHERE nombre='$login'";
	return ejecutarConsulta($sql);
}

public function verificar($login,$clave){
    	$sql="SELECT id FROM seguidor WHERE nombre='$login' AND clave='$clave'"; 
    	return ejecutarConsulta($sql);  
}

}

 ?>
