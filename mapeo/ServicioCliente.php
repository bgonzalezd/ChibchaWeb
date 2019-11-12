<?php

include ('../modelo/Cliente.php');
include ('conexion.php');

class ServicioCliente{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(60),edad int,clave varchar(50),nom_usuario varchar(50)';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM CLIENTE UNION SELECT * FROM  dblink('$this->config','SELECT * FROM CLIENTE') as resultado($this->columns) ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Cliente($row[0],$row[1],$row[2],$row[3],$row[4]);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}

	public function getClientUsername($nom_usuario){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM CLIENTE UNION SELECT * FROM  dblink('$this->config','SELECT * FROM CLIENTE') as resultado($this->columns)) AS res WHERE nom_usuario = '$nom_usuario' ORDER BY codigo;");
		$cliente = null;

		if ($result){
			while ($row = pg_fetch_row($result)) {
				$cliente = new Cliente($row[0],$row[1],$row[2],$row[3],$row[4]);

			}
		}
		return $cliente;
	}

	public function addClient($nombre, $edad, $clave, $nom_user){
		$u = $this->getClientUsername($nom_user);
		if($u == null){
			if(agregarEnTabla1($this->conexion,'CLIENTE',$this->columns)){
				$result = pg_query($this->conexion, "INSERT INTO CLIENTE VALUES (nextval('llavecliente'),'$nombre',$edad,'$clave','$nom_user');");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO CLIENTE VALUES (nextval(''llavecliente''),''$nombre'',$edad,''$clave'',''$nom_user'');');");
			}
			return "true";
		}else{
			return "false";
		}
		
		/*$result = pg_query($this->conexion, "INSERT INTO CLIENTE VALUES (NULL,'$nombre',$edad,'$clave','$nom_user');");
		$result = $this->conexion->query($sql);*/
	}
	public function getInfoClient($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM CLIENTE UNION SELECT * FROM  dblink('$this->config','SELECT * FROM CLIENTE') as resultado($this->columns)) AS res WHERE codigo = $codigo ORDER BY codigo;");
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Cliente($row[0],$row[1],$row[2],$row[3],$row[4]);
		    }
		}
		return $cliente;
	}

}


?>