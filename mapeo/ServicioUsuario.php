<?php

include ('../modelo/Usuario.php');
require_once ('conexion.php');

class ServicioUsuario{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(60),edad int,clave varchar(50),nom_usuario varchar(50), tipo_usuario varchar(1), email varchar(50)';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns) ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}

	public function getUserUsername($nom_usuario){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM USUARIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns)) AS res WHERE nom_usuario = '$nom_usuario' ORDER BY codigo;");
		$cliente = null;

		if ($result){
			while ($row = pg_fetch_row($result)) {
				$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);

			}
		}
		return $cliente;
	}

	public function addUsuario($nombre, $edad, $clave, $nom_user,$email){
		$u = $this->getUserUsername($nom_user);
		if($u == null){
			if(agregarEnTabla1($this->conexion,'USUARIO',$this->columns)){
				$result = pg_query($this->conexion, "INSERT INTO USUARIO VALUES (nextval('llaveusuario'),'$nombre',$edad,'$clave','$nom_user','N','$email');");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO USUARIO VALUES (nextval(''llaveusuario''),''$nombre'',$edad,''$clave'',''$nom_user'',''N'',''$email'');');");
			}
			return "true";
		}else{
			return "false";
		}
		
	}
	public function getInfoUsuario($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM USUARIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns)) AS res WHERE codigo = $codigo ORDER BY codigo;");
		$cliente = null;
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
		    }
		}
		return $cliente;
	}

}


?>