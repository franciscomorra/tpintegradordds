<?php
class recital {
	public $fecha,$fecha_mostrar,$precioBase,$festival,$horaInicio;
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
		$this->horaInicio = $datosConsulta["horaInicio"];
		$date = new DateTime($this->fecha); 
		$fecha_mostrar = $date->format('d-m-Y');
	}
	function AgregarBanda($id_banda,$orden){
		$query = "
		INSERT INTO  `integrador`.`bandas_recitales` (
		`fecha_recital` ,
		`festival` ,
		`id_banda` ,
		`orden`
		)
		VALUES (
		'".$this->fecha."',  '".$this->festival."',  '".$id_banda."',  '".$orden."'
		);";
		return Database::getInstance()->query($query);
	}
	
}
?>