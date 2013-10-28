<?php
class Generos_Controller {
	function __construct(){
	}
	function getAll(){
		$queryString = "SELECT * FROM generos";
		$generos = Database::getInstance()->consultaSelect($queryString);
		return $generos;
	}
}
?>