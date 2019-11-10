<?php

include ('../modelo/Cliente.php');
include ('conexion.php');

class ServicioCliente{


	public function __construct() {
		$this->conexion = conectar();
    }

	public function getAll(){
		$sql = "SELECT * FROM CLIENTE;";
		$result = $this->conexion->query($sql);
		$arr = array();
		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$cliente = new Cliente($row['codigo'],$row['nombre'],$row['edad'],$row['clave'],$row['nom_usuario']);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}

	public function getClientUsername($nom_usuario){
		$sql = "SELECT * FROM CLIENTE WHERE nom_usuario = '$nom_usuario';";
		$result = $this->conexion->query($sql);
		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$cliente = new Cliente($row['codigo'],$row['nombre'],$row['edad'],$row['clave'],$row['nom_usuario']);
		    }
		}
		return $cliente;
	}

	public function addClient($nombre, $edad, $clave, $nom_user){
		$sql = "INSERT INTO CLIENTE VALUES (NULL,'$nombre',$edad,'$clave','$nom_user');";
		$result = $this->conexion->query($sql);
	}
	public function getInfoClient($codigo){
		$sql = "SELECT * FROM CLIENTE WHERE codigo = $codigo;";
		$result = $this->conexion->query($sql);
		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$cliente = new Cliente($row['codigo'],$row['nombre'],$row['edad'],$row['clave'],$row['nom_usuario']);
		    }
		}
		return $cliente;
	}

}


?>