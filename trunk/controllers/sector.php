<?php
class Sector {
	public $nombre;
	public $color;
	public $precio_agregado;
	public $cantidad_filas;
	public $cantidad_columnas;

	function __construct($nombre){
		$this->nombre = $nombre;
		
		$queryString = "SELECT * FROM sectores WHERE `nombre` = '".$this->nombre."'";
		$datosConsulta = Database::getInstance()->consultaSelect($queryString);
		$this->color = $datosConsulta[0]["color"];
		$this->precio_agregado = $datosConsulta[0]["precio_agregado"];
		$this->cantidad_filas = $datosConsulta[0]["cantidad_filas"];
		$this->cantidad_columnas = $datosConsulta[0]["cantidad_columnas"];

	}
}
?>