<?php
function rellenar_entradas(){ 
/*Sirve solo para cuando se carga por primera vez*/
$queryString = "SELECT * FROM sectores";
$sectores = Database::getInstance()->consultaSelect($queryString);
$queryString = "SELECT * FROM recitales";
$recitales = Database::getInstance()->consultaSelect($queryString);
$queryString = "SELECT * FROM festivales";
$festivales = Database::getInstance()->consultaSelect($queryString);
print "<pre>";
print_r($sectores);
print_r($recitales);
print_r($festivales);
print "</pre>";


$db->mysqli->autocommit(FALSE);
	foreach ($festivales as $festival){
		foreach ($recitales as $recital){
			foreach ($sectores as $sector){
				for ($columna = 1; $columna<=$sector["cantidad_columnas"];$columna++){
					for ($fila = 1; $fila<=$sector["cantidad_filas"];$fila++){
						$stringQuery = "
						INSERT INTO  `integrador`.`entradas` (
								`numero` ,
								`estado` ,
								`fila` ,
								`columna` ,
								`fecha_alta` ,
								`sector` ,
								`recital`,
								`festival`
								)
								VALUES (
								NULL ,
								'0' ,
								'".$fila."',
								'".$columna."', 
								CURRENT_TIMESTAMP ,
								'".$sector["nombre"]."',
								'".$recital["fecha"]."',
								'".$festival["id_festival"]."'
								);
						";
						
						Database::getInstance()->mysqli->query($stringQuery);
					}
				}
			}
		}
	}
	Database::getInstance()->mysqli->commit();
	print "<pre>";
	print_r($db);
	print "</pre>";
}

function vaciar_todo(){
	$stringQuery = "UPDATE entradas SET `estado` = '0'";
	Database::getInstance()->query($stringQuery);
	$stringQuery = "DELETE FROM `entradas_has_descuentos` WHERE 1";
	Database::getInstance()->query($stringQuery);
}

function borrar_descuentos_vacios(){
	$stringQuery = "SELECT * FROM  `entradas_has_descuentos`";
	$entradas_descuentos = Database::getInstance()->consultaSelect($stringQuery);
	if($entradas_descuentos!=NULL){

		foreach ($entradas_descuentos as $ed){
			$entrada = new Entrada($ed["Entradas_columna"], $ed["Entradas_fila"],$ed["Entradas_sector"],$ed["Entradas_recital"],$ed["Entradas_festival"]);
			$i = 0;
			if($entrada->estado == 0){
				$entrada->eliminar_descuentos();
				$i++;
			}
		}
		if($i!=0){
			echo 'Eliminados '.$i.' descuentos no confirmados';
		}
	}
}

?>