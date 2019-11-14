<?php



function conectar()
{

    $server   = "13.82.134.144";
    $database = "chibchaweb1";
    $name     = "postgres";
    $pass     = "ANDRES2018uebS3";
    $port 	  = '5432';
    $con      = pg_connect("host=$server dbname=$database port=$port user=$name password=$pass");
    if (!$con) {
        die("Conexion fallida: " . mysqli_connect_error());
        
    }
    return $con;
}

function getConfig(){
	return 'dbname=chibchaweb2 port=5432 host=52.191.198.186 user=postgres password=ANDRES2018uebS3';
}

function agregarEnTabla1($conexion,$tabla,$columns){
	$conf = getConfig();
	$result = pg_query($conexion, "SELECT count(codigo) FROM $tabla;");
	if ($result) {
    // output data of each row
	    while($row = pg_fetch_row($result)) {
	    	$n1 = $row[0];
	    }
	}
	$result2 = pg_query($conexion, "SELECT count(codigo) FROM dblink('$conf','SELECT * FROM $tabla') AS resultado($columns);");
	if ($result2) {
    // output data of each row
	    while($row = pg_fetch_row($result2)) {
	    	$n2 = $row[0];
	    }
	}
	if($n1 == $n2){
		return true;
	}else{
		return false;
	}
}

?>