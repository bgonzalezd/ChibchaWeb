<?php

require_once ('conexion.php');

class ServicioAuditoria{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int, tabla varchar(50), accion varchar(60), cod_usuario int, fecha date';
    }

	public function addAuditoria($tabla, $accion,$cod_usuario){
		if(agregarEnTabla1($this->conexion,'AUDITORIA',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO AUDITORIA VALUES (nextval('llaveauditoria'),'$tabla','$accion',$cod_usuario,NOW());");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO AUDITORIA VALUES (nextval(''llaveauditoria''),''$tabla'',''$accion'',$cod_usuario,NOW());');");
		}
	}

	public function getAll($cod_distribuidor){
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

}


?>