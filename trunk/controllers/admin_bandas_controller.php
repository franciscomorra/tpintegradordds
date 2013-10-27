<?php
include_once "/controllers/database_controller.php";

class AdminBandas {
	function handleRequest($mensaje) {
	
		if(isset ($mensaje['columna']) && isset ($mensaje['fila'])&& isset ($mensaje['sector'])&& isset ($mensaje['sector'])){
			$entrada = new Entrada($mensaje["columna"],$mensaje["fila"],$mensaje["sector"],$mensaje["recital"]);
		}
		
		if(isset($mensaje["alta"])){
			
			
			
			/*
			if($entrada->estado == 0){
				$db = new Database();
				$recital = new Recital($entrada->recital);
				$queryString = "SELECT * FROM descuentos";
				$descuentos = $db->consultaSelect($queryString);
				$sector = new Sector($entrada->sector);
				require "views/form_descuentos.php";
			}else{
				require "views/form_anular.php";
			}
			*/
		}elseif (isset($mensaje["baja"])){
			/*
			if($entrada->estado == 0){
				if(isset($mensaje["descuentos"])){
					$entrada->agregar_descuentos($mensaje["descuentos"]);
				}
				require "views/form_confirmar_compra.php";
			}else{
				require "views/form_anular.php";
			}*/
		}elseif (isset($mensaje["modificacion"])){
			/*if($entrada->estado == 0){
				$entrada->set_estado(1);
				require "views/form_enviar_impresora.php";
			}else{
				require "views/form_anular.php";
			}*/
		}
		//MOSTRAR LISTADO
		//require "views/admin_bandas/form_listado_bandas.php"
		
	}
} 
?>
