<?php
include ('../modelo/TipoDistribuidor.php');
require_once ('conexion.php');

class ServicioTipoDistribuidor{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(50), valor numeric(4,2)';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM TIPO_DISTRIBUIDOR UNION SELECT * FROM  dblink('$this->config','SELECT * FROM TIPO_DISTRIBUIDOR') as resultado($this->columns) ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$cliente = new TipoDistribuidor($row[0],$row[1],$row[2]);
		    	array_push($arr,$cliente);
		    }
		}
		return $arr;
	}

}


?>