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
		$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
		$this->color = $datosConsulta["color"];
		$this->precio_agregado = $datosConsulta["precio_agregado"];
		$this->cantidad_filas = $datosConsulta["cantidad_filas"];
		$this->cantidad_columnas = $datosConsulta["cantidad_columnas"];

	}
}
?>