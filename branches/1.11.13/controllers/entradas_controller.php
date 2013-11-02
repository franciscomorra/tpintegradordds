<?php
class Entradas_Controller {
	function __construct(){
	}
	
	function get_all($nombre,$festival,$fecha){
		$queryString = 'SELECT * from entradas 
						WHERE 
							`sector` = "'.$nombre.'"
						AND	`festival` = "'.$festival.'" 
						AND `recital` = "'.$fecha.'"';
		$entradas = Database::getInstance()->consultaSelect($queryString);
		return $entradas;
	}
	function eliminar_descuentos($entrada){
		$query = "
			DELETE FROM entradas_has_descuentos 
			WHERE `entradas_has_descuentos`.`Entradas_columna` = ".$entrada->columna." 
			AND `entradas_has_descuentos`.`Entradas_fila` = ".$entrada->fila." 
			AND `entradas_has_descuentos`.`Entradas_sector` = '".$entrada->sector."' 
			AND `entradas_has_descuentos`.`Entradas_recital` = '".$entrada->recital."' 
			AND `entradas_has_descuentos`.`Entradas_festival` = '".$entrada->festival."' 
		";
		Database::getInstance()->query($query);
	}	
	function agregar_descuentos($descuentos,$entrada){
		Database::getInstance()->mysqli->autocommit(FALSE);
		foreach ($descuentos as $descuento => $valor) {
			$stringQuery = "
				INSERT INTO  `integrador`.`entradas_has_descuentos` (
				`Entradas_columna` ,
				`Entradas_fila` ,
				`Entradas_sector` ,
				`Entradas_recital` ,
				`Entradas_festival` ,
				`Descuentos_id_descuento`
				)
				VALUES (
				'".
				$entrada->columna."',  '".
				$entrada->fila."',  '".
				$entrada->sector."',  '".
				$entrada->recital."',  '".
				$entrada->festival."',  '".
				$descuento."'
				);
			   ";
			Database::getInstance()->mysqli->query($stringQuery);
		}
		Database::getInstance()->mysqli->commit();
	}
	function calcular_precio($entrada){
		//Esto esta hecho para el traste, pero funciona
		$sector = new Sector($entrada->sector);
		$recital = new recital($entrada->recital,$entrada->festival);
		$precioTotal = $sector->precio_agregado + $recital->precioBase;
		$query = "
				SELECT Descuentos_id_descuento FROM entradas_has_descuentos 
				WHERE 
					`entradas_has_descuentos`.`Entradas_columna` = ".$entrada->columna." 
				AND `entradas_has_descuentos`.`Entradas_fila` = ".$entrada->fila." 
				AND `entradas_has_descuentos`.`Entradas_sector` = '".$entrada->sector."' 
				AND `entradas_has_descuentos`.`Entradas_recital` = '".$entrada->recital."'
				AND `entradas_has_descuentos`.`Entradas_festival` = '".$entrada->festival."'";
		$descuentos = Database::getInstance()->consultaSelect($query);
		$precioTotalDescuentos = $precioTotal;
		if($descuentos != NULL){
			foreach ($descuentos as $descuento) {
				$queryString = "SELECT * FROM descuentos WHERE `id_descuento` = ".$descuento["Descuentos_id_descuento"];
				$resultadoConsulta = Database::getInstance()->consultaSelect($queryString);
				$porcentajeDescuento = $resultadoConsulta[0]["porcentaje"];
				$nombreDescuento = $resultadoConsulta[0]["tipo"];
				$descuentoAplicable = $precioTotal * $porcentajeDescuento / 100;
				$precioTotalDescuentos = $precioTotalDescuentos - $descuentoAplicable;
			}
			$precioTotal = $precioTotalDescuentos;
		}
		return $precioTotal;
	}
}
?>