<?php

include ('../modelo/NombreDominio.php');
include ('conexion.php');

class ServicioNombreDominio{


	public function __construct() {
		$this->conexion = conectar();
    }

	public function getAll(){
		$sql = "SELECT * FROM NOMBRE_DOMINIO;";
		$result = $this->conexion->query($sql);
		$arr = array();
		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$dominio = new NombreDominio($row['codigo'],$row['nombre'],$row['precio'],$row['duracion_meses'],$row['renovacion']);
		    	array_push($arr,$dominio);
		    }
		}
		return $arr;
	}

	public function getValidOptions($dominio){
		$sql = "SELECT nombre_dominio.nombre, nombre_dominio.duracion_meses, nombre_dominio.precio, nombre_dominio.renovacion FROM nombre_dominio WHERE nombre_dominio.codigo NOT IN (SELECT dominio_adquirido.cod_nombre_dominio FROM dominio_adquirido WHERE dominio_adquirido.nombre = '$dominio');";
		$result = $this->conexion->query($sql);
		$arr = array();
		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$arr2 = array('nombre'=>$row['nombre'],'duracion_meses'=>$row['duracion_meses'],'precio'=>$row['precio'],'renovacion'=>$row['renovacion']);
		    	array_push($arr, $arr2);
		    }
		}
		return $arr;
	}

}


?>