<?php
class Sectores_Controller {
	public $nombre;
	public $color;
	public $precio_agregado;
	public $cantidad_filas;
	public $cantidad_columnas;
	function __construct(){
	}
	function get_all(){
		$queryString = "SELECT * FROM sectores";
		$sectores = Database::getInstance()->consultaSelect($queryString);
		return $sectores;
	}
}
?>