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
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO_T ORDER BY codigo;");
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
	public function getClientes(){
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO_T WHERE tipo_usuario = 'N' ORDER BY codigo;");
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
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT USUARIO_T.codigo,USUARIO_T.nombre,USUARIO_T.email,TIPO_DISTRIBUIDOR_T.etiqueta, TIPO_DISTRIBUIDOR_T.codigo as cod_tipo FROM USUARIO_T, DISTRIBUIDOR_T, TIPO_DISTRIBUIDOR_T WHERE USUARIO_T.codigo = DISTRIBUIDOR_T.codigo and DISTRIBUIDOR_T.cod_tipo = TIPO_DISTRIBUIDOR_T.codigo) as todo;");
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
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO_T WHERE nom_usuario = '$nom_usuario' ORDER BY codigo;");
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
				$result = pg_query($this->conexion, "INSERT INTO DISTRIBUIDOR VALUES (setval('llaveusuario',nextval('llaveusuario')-2),$tipo);");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO USUARIO VALUES (nextval(''llaveusuario''),''$nombre'',''$clave'',''$nom_user'',''D'',''$email'');');");
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO DISTRIBUIDOR VALUES (setval(''llaveusuario'',nextval(''llaveusuario'')-2),$tipo);');");
			}
			return "true";
		}else{
			return "false";
		}
		
			
		
	}
	public function getInfoUsuario($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM USUARIO_T WHERE codigo = $codigo ORDER BY codigo;");
		$cliente = null;
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
		    }
		}
		return $cliente;
	}

	public function getInfoDistribuidor($codigo){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT * FROM DISTRIBUIDOR_T WHERE codigo = $codigo) AS todo;");
		$cliente = null;
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = $row[0];
		    }
		}
		return $cliente;
	}

	public function editUsuario($codigo,$nombre, $nom_usuario, $email){
		$u = $this->getUserUsername($nom_usuario);
		if($u == null){
			if(($codigo%2)!=0){
				$result = pg_query($this->conexion, "UPDATE USUARIO SET nombre = '$nombre', nom_usuario = '$nom_usuario' , email = '$email' WHERE codigo = $codigo;");
			}else{
				$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE USUARIO SET nombre = ''$nombre'' , nom_usuario = ''$nom_usuario'' , email = ''$email'' WHERE codigo = $codigo;');");
			}
			return "true";
		}else{
			return "false";
		}
		
	}
	public function editPerfil($codigo,$nombre, $clave, $nom_usuario, $email){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "UPDATE USUARIO SET nombre = '$nombre', clave = '$clave', nom_usuario = '$nom_usuario' , email = '$email' WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE USUARIO SET nombre = ''$nombre'' , clave = ''$clave'', nom_usuario = ''$nom_usuario'' , email = ''$email'' WHERE codigo = $codigo;');");
		}
	}
	public function editDistribuidor($codigo,$nombre, $email,$cod_tipo){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "UPDATE USUARIO SET nombre = '$nombre' , email = '$email' WHERE codigo = $codigo;");
			$result = pg_query($this->conexion, "UPDATE DISTRIBUIDOR SET cod_tipo = $cod_tipo WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE USUARIO SET nombre = ''$nombre'' , email = ''$email'' WHERE codigo = $codigo;');");
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE DISTRIBUIDOR SET cod_tipo = $cod_tipo WHERE codigo = $codigo;');");
		}
	}

}


?>