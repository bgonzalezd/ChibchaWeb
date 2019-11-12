<?php
class NombreDominio{
	public function __construct($codigo, $nombre, $duracion_meses,$precio, $renovacion) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->duracion_meses = $duracion_meses;
		$this->renovacion = $renovacion;
	}

    
}

?>