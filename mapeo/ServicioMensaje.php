<?php

include ('../modelo/Mensaje.php');
require_once ('conexion.php');

class ServicioMensaje{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,cod_usuario int, asunto varchar(50), mensaje varchar(1000), fecha date';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM MENSAJE UNION SELECT * FROM  dblink('$this->config','SELECT * FROM MENSAJE') as resultado($this->columns) ORDER BY fecha;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Mensaje($row[0],$row[1],$row[2],$row[3],$row[4]);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}

	public function enviarMensaje($cod_usuario,$asunto,$mensaje){
		if(agregarEnTabla1($this->conexion,'MENSAJE',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO MENSAJE VALUES (nextval('llavemensaje'),$cod_usuario,'$asunto','$mensaje',NOW());");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO MENSAJE VALUES (nextval(''llavemensaje''),$cod_usuario,''$asunto'',''$mensaje'',NOW());');");
		}
		
	}
	public function getInfoMensaje($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM (SELECT * FROM MENSAJE UNION SELECT * FROM  dblink('$this->config','SELECT * FROM MENSAJE') as resultado($this->columns)) AS res WHERE codigo = $codigo ORDER BY codigo;");
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new Mensaje($row[0],$row[1],$row[2],$row[3],$row[4]);
		    }
		}
		return $cliente;
	}

}


?>