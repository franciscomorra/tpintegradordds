<?php
class Recitales_Controller {
	function __construct(){
	}
	function get_all($festival){
		$queryString = "SELECT * FROM recitales WHERE festival = '".$festival."'";
		$recitales = Database::getInstance()->consultaSelect($queryString);
		return $recitales;
	}
}
?>