<?php
class Festivales_Controller {
	function __construct(){
	}
	function get_all(){
		$queryString = "SELECT * FROM festivales";
		$festivales = Database::getInstance()->consultaSelect($queryString);
		return $festivales;
	}
}
?>