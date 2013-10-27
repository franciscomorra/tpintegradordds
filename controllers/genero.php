<?php
class Genero {
	public $id;
	public $nombre;
	
	function __construct($id){
		$this->id = $id;
		
		$queryString = "SELECT * FROM generos WHERE `id` = '".$this->id."'";
		$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
		$this->nombre = $datosConsulta["nombre"];
	}
}
?>