<?php
class Festival {
	public $id_festival,$nombre;
	function __construct($id_festival){
		$this->id_festival = $id_festival;
		$queryString = "
			SELECT nombre
			FROM festivales
			WHERE
				`id_festival` = '".$this->id_festival."'";
		$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
		$this->nombre = $datosConsulta["nombre"];
	}
}
?>