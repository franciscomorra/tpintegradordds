<?php
class Bandas_Controller {
	function __construct(){}
	function getAll($aExclude = null){
		$query = "
			SELECT 
				b.nombre as nombre_banda, 
				b.id_banda as id, 
				b.genero,
				g.nombre as nombre_genero 
			FROM bandas b , generos g 
			WHERE g.id = b.genero";
        if(!empty($aExclude) && is_array($aExclude)){
            $query .= " AND b.id_banda NOT IN (".implode(',',$aExclude).")";
        }
		$query .= "	ORDER BY b.nombre";
		$result = Database::getInstance()->consultaSelect($query);
		return $result;
	}

	
}