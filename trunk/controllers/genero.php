<?php
class Genero {
	public $id;
	public $nombre;
	
	function __construct(){
		/*
		if($id!=NULL){
			$this->id = $id;
			$queryString = "SELECT * FROM generos WHERE `id` = '".$this->id."'";
			$datosConsulta = Database::getInstance()->consultaSelect($queryString);
			$this->nombre = $datosConsulta[0]["nombre"];
		}
		*/
	}
}
?>