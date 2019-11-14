<?php

class Mensaje{
	public function __construct($codigo, $cod_usuario, $asunto, $mensaje, $fecha) {
		$this->codigo = $codigo;
		$this->cod_usuario = $cod_usuario;
		$this->asunto = $asunto;
		$this->mensaje = $mensaje;
		$this->fecha = $fecha;
    }

    
}

?>