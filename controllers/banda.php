<?php
class Banda {
	
	public $nombre,$id,$genero;
	
	function __construct(){}
	function update_banda($banda){
		$query = "
			UPDATE  bandas
			SET `genero` =  '".$banda->genero."',
				`nombre` =  '".$banda->nombre."'
			WHERE `bandas`.`id_banda` = ".$banda->id;
		return Database::getInstance()->query($query);
	}
	function create_banda($banda){
		$query = "
			INSERT INTO bandas 
			(nombre,genero)
			VALUES ('".$banda->nombre."','".$banda->genero."')
			";
		return Database::getInstance()->query($query);
	}
	function create_banda($banda){
		$query = "
			DELETE FROM bandas 
			WHERE `bandas`.`id_banda` = ".$banda->id;
		return Database::getInstance()->query($query);
	}
	function getAll(){
		$query = "SELECT * FROM bandas";
		return Database::getInstance()->query($query);
	}
	
}
?>