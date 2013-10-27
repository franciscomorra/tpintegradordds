<?php
//include_once "functions.php";
include_once "/controllers/database_controller.php";

class AdminHorarios {
	function handleRequest($mensaje) {
	
		if(isset ($mensaje['columna']) && isset ($mensaje['fila'])&& isset ($mensaje['sector'])&& isset ($mensaje['sector'])){
			$entrada = new Entrada($mensaje["columna"],$mensaje["fila"],$mensaje["sector"],$mensaje["recital"]);
		}
		
		if(isset($mensaje["consultar_butaca"])){
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
		}elseif (isset($mensaje["enviar_descuentos"])){
			/*
			if($entrada->estado == 0){
				if(isset($mensaje["descuentos"])){
					$entrada->agregar_descuentos($mensaje["descuentos"]);
				}
				require "views/form_confirmar_compra.php";
			}else{
				require "views/form_anular.php";
			}*/
		}elseif (isset($mensaje["compra_final"])){
			/*if($entrada->estado == 0){
				$entrada->set_estado(1);
				require "views/form_enviar_impresora.php";
			}else{
				require "views/form_anular.php";
			}*/
		}elseif (isset($mensaje["compra_cancelar"])){
			/*$entrada->eliminar_descuentos();
			header('Location: ');	
			*/
		}elseif (isset($mensaje["entrada_anular"])){
			/*$precioDevolver = $entrada->calcular_precio();
			$entrada->eliminar_descuentos();
			$entrada->set_estado(0);
			require "views/anular_sumario.php";
			*/
		}elseif (isset($mensaje["consultar_sector_recital"])){
			/*$sector = new Sector($mensaje["sector"]);
			$cantidadFilas = $sector->cantidadFilas;
			$cantidadColumnas = $sector->cantidadColumnas;
			$date = new DateTime($mensaje["recital"]); 
			$fecha_mostrar = $date->format('d-m-Y');
			require "views/form_fila_col.php";
			*/
		}else{
		
			/*$db = new Database();
			$queryString = "SELECT * FROM recitales";
			$recitales = $db->consultaSelect($queryString);
			$queryString = "SELECT * FROM sectores";
			$sectores = $db->consultaSelect($queryString);
			require "views/form_fecha_sector.php";
			*/
		}
	}
} 
?>
