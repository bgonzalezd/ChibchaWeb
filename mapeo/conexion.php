<?php



function conectar()
{

    $server   = "localhost";
    $database = "chibchaweb1";
    $name     = "postgres";
    $pass     = "12345678";
    $con      = pg_connect("host=$server dbname=$database user=$name password=$pass");
    if (!$con) {
        die("Conexion fallida: " . mysqli_connect_error());
        
    }
    return $con;
}

function getConfig(){
	return 'dbname=chibchaweb2 user=postgres password=12345678';
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