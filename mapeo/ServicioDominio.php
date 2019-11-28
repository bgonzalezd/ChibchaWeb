<?php
include ('../modelo/Dominio.php');

require_once ('conexion.php');

class ServicioDominio{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(50),cod_nombre_dominio int, cod_cliente int, estado varchar(1)';
    }

	public function addDominio($nombre, $cod_nombre_dominio,$cod_cliente,$estado){
		if(agregarEnTabla1($this->conexion,'DOMINIO_ADQUIRIDO',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO DOMINIO_ADQUIRIDO VALUES (nextval('llavedominio_adquirido'),'$nombre',$cod_nombre_dominio,$cod_cliente,'$estado');");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO DOMINIO_ADQUIRIDO VALUES (nextval(''llavedominio_adquirido''),''$nombre'',$cod_nombre_dominio,$cod_cliente,''$estado'');');");
		}
	}

	public function getInactivos($cod_distribuidor){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT DOMINIO_ADQUIRIDO_T.codigo AS cod_dominio_adquirido, USUARIO_T.nombre as nom_cliente, USUARIO_T.email, DOMINIO_ADQUIRIDO_T.nombre, NOMBRE_DOMINIO_T.nombre AS nom_dominio, NOMBRE_DOMINIO_T.precio, NOMBRE_DOMINIO_T.renovacion, NOMBRE_DOMINIO_T.duracion_meses FROM DOMINIO_ADQUIRIDO_T,USUARIO_T,NOMBRE_DOMINIO_T WHERE DOMINIO_ADQUIRIDO_T.cod_nombre_dominio = NOMBRE_DOMINIO_T.codigo AND DOMINIO_ADQUIRIDO_T.cod_cliente = USUARIO_T.codigo AND DOMINIO_ADQUIRIDO_T.estado = 'I' AND NOMBRE_DOMINIO_T.cod_distribuidor = $cod_distribuidor) AS todo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	array_push($arr,$row[0]);
		    }
		}
		return $arr;
	}
	public function getActivos($cod_distribuidor){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT DOMINIO_ADQUIRIDO_T.codigo AS cod_dominio_adquirido, USUARIO_T.nombre as nom_cliente, USUARIO_T.email, DOMINIO_ADQUIRIDO_T.nombre, NOMBRE_DOMINIO_T.nombre AS nom_dominio, NOMBRE_DOMINIO_T.precio, NOMBRE_DOMINIO_T.renovacion, NOMBRE_DOMINIO_T.duracion_meses FROM DOMINIO_ADQUIRIDO_T,USUARIO_T,NOMBRE_DOMINIO_T WHERE DOMINIO_ADQUIRIDO_T.cod_nombre_dominio = NOMBRE_DOMINIO_T.codigo AND DOMINIO_ADQUIRIDO_T.cod_cliente = USUARIO_T.codigo AND DOMINIO_ADQUIRIDO_T.estado = 'A' AND NOMBRE_DOMINIO_T.cod_distribuidor = $cod_distribuidor) AS todo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	array_push($arr,$row[0]);
		    }
		}
		return $arr;
	}

	public function getMisDominios($cod_usuario){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT DOMINIO_ADQUIRIDO_T.codigo AS cod_dominio_adquirido, USUARIO_T.nombre as nom_distribuidor, USUARIO_T.email, DOMINIO_ADQUIRIDO_T.nombre, NOMBRE_DOMINIO_T.nombre AS nom_dominio, NOMBRE_DOMINIO_T.precio, NOMBRE_DOMINIO_T.renovacion, NOMBRE_DOMINIO_T.duracion_meses, DOMINIO_ADQUIRIDO_T.estado, TIPO_DISTRIBUIDOR_T.etiqueta FROM DOMINIO_ADQUIRIDO_T,USUARIO_T,NOMBRE_DOMINIO_T, DISTRIBUIDOR_T, TIPO_DISTRIBUIDOR_T WHERE DOMINIO_ADQUIRIDO_T.cod_nombre_dominio = NOMBRE_DOMINIO_T.codigo AND NOMBRE_DOMINIO_T.cod_distribuidor = USUARIO_T.codigo AND USUARIO_T.codigo = DISTRIBUIDOR_T.codigo AND DISTRIBUIDOR_T.cod_tipo = TIPO_DISTRIBUIDOR_T.codigo AND DOMINIO_ADQUIRIDO_T.cod_cliente = $cod_usuario) AS todo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	array_push($arr,$row[0]);
		    }
		}
		return $arr;
	}

	public function aceptarDominio($codigo){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "UPDATE DOMINIO_ADQUIRIDO SET estado = 'A' WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE DOMINIO_ADQUIRIDO SET estado = ''A'' WHERE codigo = $codigo;')");
		}
	}
	public function comprarDominio($codigo){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "UPDATE DOMINIO_ADQUIRIDO SET estado = 'C' WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE DOMINIO_ADQUIRIDO SET estado = ''C'' WHERE codigo = $codigo;')");
		}
	}


	public function negarDominio($codigo){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "DELETE FROM DOMINIO_ADQUIRIDO WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','DELETE FROM DOMINIO_ADQUIRIDO WHERE codigo = $codigo;')");
		}
	}

}


?>