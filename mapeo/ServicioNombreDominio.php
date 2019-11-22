<?php
include ('../modelo/NombreDominio.php');

require_once ('conexion.php');

class ServicioNombreDominio{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(30),duracion_meses int,precio numeric(4,2),renovacion numeric(4,2),cod_distribuidor int';
    }

	public function getAll(){
		$result = pg_query($this->conexion, "SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') as resultado($this->columns) ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$dominio = new NombreDominio($row[0],$row[1],$row[2],$row[3],$row[4]);
		    	array_push($arr,$dominio);
		    }
		}
		return $arr;
	}
	public function getNamesInfo($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM(SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') as resultado($this->columns)) as todo where cod_distribuidor = $codigo ORDER BY codigo;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$dominio = new NombreDominio($row[0],$row[1],$row[2],$row[3],$row[4]);
		    	array_push($arr,$dominio);
		    }
		}
		return $arr;
	}

	public function getValidOptions($dominio){
		$result = pg_query($this->conexion, "SELECT sub.nombre, sub.duracion_meses, sub.precio, sub.renovacion FROM (SELECT * FROM nombre_dominio UNION SELECT * FROM dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') AS resultado ($this->columns)) AS sub WHERE sub.codigo NOT IN (SELECT sub2.cod_nombre_dominio FROM (SELECT * FROM dominio_adquirido UNION SELECT * FROM dblink('$this->config','SELECT * FROM DOMINIO_ADQUIRIDO') AS resultado(codigo int, nombre varchar(50),cod_nombre_dominio int,cod_cliente int)) AS sub2 WHERE sub2.nombre = '$dominio');");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$arr2 = array('nombre'=>$row[0],'duracion_meses'=>$row[1],'precio'=>$row[2],'renovacion'=>$row[3]);
		    	array_push($arr, $arr2);
		    }
		}
		return $arr;
	}

	public function addNombreDominio($nombre, $precio, $renovacion, $cod_distribuidor){
		if(agregarEnTabla1($this->conexion,'NOMBRE_DOMINIO',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO NOMBRE_DOMINIO VALUES (nextval('llavenombre_dominio'),'$nombre',12,$precio,$renovacion,$cod_distribuidor);");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO NOMBRE_DOMINIO VALUES (nextval(''llavenombre_dominio''),''$nombre'',12,$precio,$renovacion,$cod_distribuidor);');");
		}
	}

}


?>