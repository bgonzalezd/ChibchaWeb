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

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT AUDITORIA_T.codigo, AUDITORIA_T.tabla, AUDITORIA_T.accion, AUDITORIA_T.cod_usuario, AUDITORIA_T.fecha, USUARIO_T.nombre, USUARIO_T.email FROM AUDITORIA_T, USUARIO_T WHERE AUDITORIA_T.cod_usuario = USUARIO_T.codigo ORDER BY codigo DESC) AS todo;");
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