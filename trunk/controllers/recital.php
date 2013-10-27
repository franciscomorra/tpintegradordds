<?php
class recital {
	public $fecha,$fecha_mostrar,$precioBase,$festival;
	function __construct($fecha,$festival){
		$this->fecha = $fecha;
		$this->festival = $festival;
		$queryString = "
			SELECT *
			FROM recitales
			WHERE
				`festival` = '".$this->festival."'
			AND `fecha` = '".$this->fecha."'";
		$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
		$this->precioBase = $datosConsulta["precioBase"];
		$date = new DateTime($this->fecha); 
		$fecha_mostrar = $date->format('d-m-Y');
	}
}
?>