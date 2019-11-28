<?php
require_once ('conexion.php');

class ServicioHosting{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(50),sistema_operativo varchar(50),cod_nombre_dominio int, cod_usuario int, tipo int';
    }

	public function addHosting($nombre, $sistema,$cod_usuario,$tipo){
		if(agregarEnTabla1($this->conexion,'HOSTING_ADQUIRIDO',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO HOSTING_ADQUIRIDO VALUES (nextval('llavehosting_adquirido'),'$nombre','$sistema',-1,$cod_usuario,$tipo);");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO HOSTING_ADQUIRIDO VALUES (nextval(''llavehosting_adquirido''),''$nombre'',''$sistema'',-1,$cod_usuario,$tipo);');");
		}
	}
	public function getMisHosting($cod_usuario){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT * FROM HOSTING_ADQUIRIDO_T WHERE cod_usuario = $cod_usuario) AS todo;");
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