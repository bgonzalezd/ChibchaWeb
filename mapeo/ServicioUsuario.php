<?php
include ('../modelo/Usuario.php');
require_once ('conexion.php');

class ServicioUsuario{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(60),clave varchar(50),nom_usuario varchar(50), tipo_usuario varchar(1), email varchar(50)';
		$this->columns_distribuidor = 'codigo int, cod_tipo int';
		$this->columns_tipo_distribuidor = 'codigo int, nombre varchar(50), valor numeric(4,2)';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns) ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}
	public function getDistribuidores(){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT * FROM (SELECT * FROM USUARIO UNION SELECT * FROM dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns) ORDER BY codigo) as t0 , (SELECT * FROM DISTRIBUIDOR UNION SELECT * FROM dblink('$this->config','SELECT * FROM DISTRIBUIDOR') as resultado($this->columns_distribuidor) ORDER BY codigo) as t1, (SELECT * FROM TIPO_DISTRIBUIDOR UNION SELECT * FROM dblink('$this->config','SELECT * FROM TIPO_DISTRIBUIDOR') as resultado($this->columns_tipo_distribuidor) ORDER BY codigo) as t2 WHERE t0.codigo = t1.codigo and t1.cod_tipo = t2.codigo) as todo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	array_push($arr,$row[0]);
		    }
		}
		return $arr;
	}

	public function getUserUsername($nom_usuario){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM USUARIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM USUARIO') as resultado($this->columns)) AS res WHERE nom_usuario = '$nom_usuario' ORDER BY codigo;");
		$cliente = null;

		if ($result){
			while ($row = pg_fetch_row($result)) {
				$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);

			}
		}
		return $cliente;
	}

	public function addUsuario($nombre, $clave, $nom_user,$email){
		$u = $this->getUserUsername($nom_user);
		if($u == null){
			if(agregarEnTabla1($this->conexion,'USUARIO',$this->columns)){
				$result = pg_query($this->conexion, "INSERT INTO USUARIO VALUES (nextval('llaveusuario'),'$nombre','$clave','$nom_user','N','$email');");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO USUARIO VALUES (nextval(''llaveusuario''),''$nombre'',''$clave'',''$nom_user'',''N'',''$email'');');");
			}
			return "true";
		}else{
			return "false";
		}
		
	}
	public function addDistribuidor($nombre, $clave, $nom_user,$email,$tipo){
		$u = $this->getUserUsername($nom_user);
		if($u == null){
			if(agregarEnTabla1($this->conexion,'USUARIO',$this->columns)){
				$result = pg_query($this->conexion, "INSERT INTO USUARIO VALUES (nextval('llaveusuario'),'$nombre','$clave','$nom_user','D','$email');");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO USUARIO VALUES (nextval(''llaveusuario''),''$nombre'',''$clave'',''$nom_user'',''D'',''$email'');');");
			}
			if(agregarEnTabla1($this->conexion,'DISTRIBUIDOR',$this->columns_distribuidor)){
				$result = pg_query($this->conexion, "INSERT INTO DISTRIBUIDOR VALUES (setval('llaveusuario',nextval('llaveusuario')-2),$tipo);");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO DISTRIBUIDOR VALUES (setval(''llaveusuario'',nextval(''llaveusuario'')-2),$tipo);');");
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
		    	$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
		    }
		}
		return $cliente;
	}

}


?>