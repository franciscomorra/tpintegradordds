<?php
class Generos_Controller {
	function __construct(){
	}
	function get_all(){
		$queryString = "SELECT * FROM generos";
		$generos = Database::getInstance()->consultaSelect($queryString);
		return $generos;
	}
}
?>