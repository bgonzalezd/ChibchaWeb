<?php
include ('../modelo/NombreDominio.php');

require_once ('conexion.php');

class ServicioNombreDominio{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(30),duracion_meses int,precio numeric(4,2),renovacion numeric(4,2),cod_distribuidor int';
		$this->columns_dominio = 'codigo int,nombre varchar(50),cod_nombre_dominio int, cod_cliente int';
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
	public function getNombres(){
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

	public function getName($codigo){
		$result = pg_query($this->conexion, "SELECT * FROM(SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM  dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') as resultado($this->columns)) as todo where codigo = $codigo;");
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
		$result = pg_query($this->conexion, "SELECT todo2.nombre FROM (SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') AS res1($this->columns))as todo2 where todo2.nombre NOT IN (SELECT * FROM (SELECT sub2.nombre FROM (SELECT * FROM DOMINIO_ADQUIRIDO UNION SELECT * FROM dblink('$this->config','SELECT * FROM DOMINIO_ADQUIRIDO') AS res0($this->columns_dominio)) as sub1, (SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') AS res0($this->columns)) as sub2  WHERE sub1.cod_nombre_dominio = sub2.codigo and sub1.nombre = '$dominio') as todo) GROUP BY todo2.nombre;");
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
		$result = pg_query($this->conexion, "SELECT row_to_json(todo) FROM (SELECT t0.codigo,t0.nombre as nombre_dominio,t0.duracion_meses,t0.precio,t0.renovacion,t0.cod_distribuidor,t1.nombre as nombre_distribuidor, t1.email FROM (SELECT * FROM NOMBRE_DOMINIO UNION SELECT * FROM dblink('$this->config','SELECT * FROM NOMBRE_DOMINIO') AS resultado(codigo int,nombre varchar(30),duracion_meses int,precio numeric(4,2),renovacion numeric(4,2),cod_distribuidor int)) AS t0,(SELECT * FROM USUARIO UNION SELECT * FROM dblink('$this->config','SELECT * FROM USUARIO') AS resultado(codigo int,nombre varchar(60),clave varchar(50),nom_usuario varchar(50), tipo_usuario varchar(1), email varchar(50))) AS t1 where t0.cod_distribuidor = t1.codigo and t0.nombre = '$nombre_dom') as todo;");
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