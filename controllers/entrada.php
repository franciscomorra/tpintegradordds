<?php
class Entrada {
	public $columna,$fila,$sector,$recital,$estado,$fecha_alta,$festival;
	function __construct($columna,$fila,$sector,$recital,$festival){
		$this->columna = $columna;
		$this->fila = $fila;
		$this->sector = $sector;
		$this->recital = $recital;
		$this->festival = $festival;
		$queryString = "
			SELECT estado, fecha_alta
			FROM entradas 
			WHERE
				`columna` = \"".$columna."\" AND 
				`fila` = \"".$fila."\" AND 
				`sector` = \"".$sector."\" AND 
				`recital` = \"".$recital."\" AND
				`festival` = \"".$festival."\" 
		";
		$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
		$this->estado = $datosConsulta["estado"];
		$this->fecha_alta = $datosConsulta["fecha_alta"];
		
	}
	function set_estado($estado){
		$this->estado = $estado;
		$query = "
			UPDATE  entradas 
			SET  `estado` =  '".$this->estado."',`fecha_alta` = CURRENT_TIMESTAMP 
			WHERE `entradas`.`fila` =".$this->fila." 
			AND  `entradas`.`columna` =".$this->columna." 
			AND  `entradas`.`sector` =  '".$this->sector."' 
			AND  `entradas`.`recital` =  '".$this->recital."' 
			AND  `entradas`.`festival` =  '".$this->festival."';
		";
		return Database::getInstance()->query($query);
	}
}
?>