<?php
class Banda {
	
	public $nombre,$id,$genero;
	

	function __construct(){

	}
	
	function actualizar_datos(){
		if($this->id!=NULL){
			$this->id = $id;
			$queryString = "
				SELECT b.nombre as nombre, g.genero as genero, g.id as id_genero
				FROM bandas, generos 
				WHERE
					b.`id` = \"".$this->id."\"
					AND g.id = b.genero
				";
			$datosConsulta = Database::getInstance()->consultaSelect($queryString)[0];
			$this->nombre = $datosConsulta["nombre"];
			$this->genero = new Genero($idgen);
			$this->genero->id = $datosConsulta["id_genero"];
			$this->genero->nombre = $datosConsulta["genero"];
		}
	
	}
	
	
	function update_banda(){
		$query = "
			UPDATE  bandas
			SET `genero` =  '".$this->genero."',
				`nombre` =  '".$this->nombre."'
			WHERE `bandas`.`id_banda` = ".$this->id;
		return Database::getInstance()->query($query);
	}
	
	function create_banda(){
		$query = "
			INSERT INTO bandas 
			(nombre,genero)
			VALUES ('".$this->nombre."','".$this->genero->id."')
			";
		return Database::getInstance()->query($query);
	}
	function delete_banda(){
		$query = "
			DELETE FROM bandas 
			WHERE `bandas`.`id_banda` = ".$this->id;
		return Database::getInstance()->query($query);
	}
}
?>