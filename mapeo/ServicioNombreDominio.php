<?php
include ('../modelo/NombreDominio.php');

require_once ('conexion.php');

class ServicioNombreDominio{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(30),duracion_meses int,precio numeric(4,2),renovacion numeric(4,2),cod_distribuidor int';
		$this->columns_dominio = 'codigo int,nombre varchar(50),cod_nombre_dominio int, cod_cliente int, estado varchar(1)';
    }
	public function getNombres(){
		$result = pg_query($this->conexion, "SELECT * FROM NOMBRE_DOMINIO_T");
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
		$result = pg_query($this->conexion, "SELECT * FROM NOMBRE_DOMINIO_T where cod_distribuidor = $codigo ORDER BY codigo;");
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

	public function getName($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM NOMBRE_DOMINIO_T where codigo = $codigo;");
		$arr = null;
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$arr = new NombreDominio($row[0],$row[1],$row[2],$row[3],$row[4]);
		    }
		}
		return $arr;
	}

	public function getValidOptions($dominio){
		$result = pg_query($this->conexion, "SELECT NOMBRE_DOMINIO_T.nombre FROM NOMBRE_DOMINIO_T where NOMBRE_DOMINIO_T.nombre NOT IN (SELECT * FROM (SELECT NOMBRE_DOMINIO_T.nombre FROM DOMINIO_ADQUIRIDO_T,NOMBRE_DOMINIO_T  WHERE DOMINIO_ADQUIRIDO_T.cod_nombre_dominio = NOMBRE_DOMINIO_T.codigo and DOMINIO_ADQUIRIDO_T.nombre = '$dominio') as todo) GROUP BY NOMBRE_DOMINIO_T.nombre;");
		$arr = array();
		if ($result) {
	    // output data of each row
		    while($row = pg_fetch_row($result)) {
		    	$arr2 = array('nombre'=>$row[0]);
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

	public function editNombreDominio($codigo,$nombre, $precio, $renovacion){
		if(($codigo%2)!=0){
			$result = pg_query($this->conexion, "UPDATE NOMBRE_DOMINIO SET nombre = '$nombre', precio = $precio, renovacion = $renovacion WHERE codigo = $codigo;");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','UPDATE NOMBRE_DOMINIO SET nombre = ''$nombre'', precio = $precio, renovacion = $renovacion WHERE codigo = $codigo;');");
		}
	}

	public function getPrecios($nombre_dom){
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT NOMBRE_DOMINIO_T.codigo,NOMBRE_DOMINIO_T.nombre as nombre_dominio,NOMBRE_DOMINIO_T.duracion_meses,NOMBRE_DOMINIO_T.precio,NOMBRE_DOMINIO_T.renovacion,NOMBRE_DOMINIO_T.cod_distribuidor,USUARIO_T.nombre as nombre_distribuidor, USUARIO_T.email FROM NOMBRE_DOMINIO_T,USUARIO_T where NOMBRE_DOMINIO_T.cod_distribuidor = USUARIO_T.codigo and NOMBRE_DOMINIO_T.nombre = '$nombre_dom') as todo;");
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