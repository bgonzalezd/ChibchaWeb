<?php

class Cliente{
	public function __construct($codigo, $nombre, $edad, $clave, $nom_usuario) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->clave = $clave;
		$this->nom_usuario = $nom_usuario;
    }

    
}

?>