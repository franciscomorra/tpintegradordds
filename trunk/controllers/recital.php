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
    function quitarBanda($id_banda, $id_festival, $fecha){
        $query = "
		DELETE FROM bandas_recitales WHERE id_banda ='".$id_banda."' AND fecha_recital='".$fecha."' AND festival='".$id_festival."';";

        return Database::getInstance()->query($query);
    }
	public static function getBandas($fecha,$festival){
        $queryString = "
			SELECT b.nombre nombre_banda, b.id_banda id, br.festival, br.orden, g.id id_genero, g.nombre nombre_genero
			FROM bandas_recitales br INNER JOIN bandas b ON b.id_banda=br.id_banda INNER JOIN generos g ON b.genero=g.id
			WHERE
				br.`festival` = '".$festival."'
			AND br.`fecha_recital` = '".$fecha."'
			ORDER BY orden ASC";

        $datosConsulta = Database::getInstance()->consultaSelect($queryString);

        return $datosConsulta;
    }
}
?>