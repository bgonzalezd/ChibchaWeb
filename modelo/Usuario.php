<?php

class Usuario{
	public function __construct($codigo, $nombre, $edad, $clave, $nom_usuario, $tipo_usuario, $email) {
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->clave = $clave;
		$this->nom_usuario = $nom_usuario;
		$this->tipo_usuario = $tipo_usuario;
		$this->email = $email;
    }

    
}

?>