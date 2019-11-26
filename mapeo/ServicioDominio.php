<?php
include ('../modelo/Dominio.php');

require_once ('conexion.php');

class ServicioDominio{


	public function __construct() {
		$this->conexion = conectar();
		$this->config = getConfig();
		$this->columns = 'codigo int,nombre varchar(50),cod_nombre_dominio int, cod_cliente int';
    }

	public function addDominio($nombre, $cod_nombre_dominio,$cod_cliente,$estado){
		if(agregarEnTabla1($this->conexion,'DOMINIO_ADQUIRIDO',$this->columns)){
			$result = pg_query($this->conexion, "INSERT INTO DOMINIO_ADQUIRIDO VALUES (nextval('llavedominio_adquirido'),'$nombre',$cod_nombre_dominio,$cod_cliente,'$estado');");
		}else{
			$result = pg_query($this->conexion, "SELECT dblink('$this->config','INSERT INTO DOMINIO_ADQUIRIDO VALUES (nextval(''llavedominio_adquirido''),''$nombre'',$cod_nombre_dominio,$cod_cliente,''$estado'');');");
		}
	}

}


?>