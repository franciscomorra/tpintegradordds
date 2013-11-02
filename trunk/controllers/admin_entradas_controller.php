<?php

include_once "/controllers/database_controller.php";
include_once "/controllers/entradas_controller.php";
include_once "/controllers/entrada.php";
include_once "/controllers/sectores_controller.php";
include_once "/controllers/sector.php";
include_once "/controllers/recitales_controller.php";
include_once "/controllers/recital.php";
include_once "/controllers/festivales_controller.php";

class AdminEntradas {

    protected $entityManager;

    function __construct($entityManager){
        $this->entityManager = $entityManager;
    }

	function handleRequest($mensaje) {
		$festivales_controller = new Festivales_Controller($this->entityManager);
		$recitales_controller = new Recitales_Controller();
		$entradas_controller = new Entradas_Controller();
		$sectores_controller = new Sectores_Controller();
		if(isset ($mensaje['columna']) && isset ($mensaje['fila'])&& isset ($mensaje['sector'])&& isset ($mensaje['festival'])){
			$entrada = new Entrada(
						$mensaje["columna"],
						$mensaje["fila"],
						$mensaje["sector"],
						$mensaje["recital"],
						$mensaje["festival"]
						);
		}
		if(isset($mensaje["consultar_butaca"])){
			//Tengo sector,recital,fila,columna, muestro los descuentos disponibles
			if($entrada->estado == 0){
				$queryString = "SELECT * FROM descuentos";
				$descuentos = Database::getInstance()->consultaSelect($queryString);
				$sector = new Sector($entrada->sector);
				$recital = new Recital($entrada->recital,$entrada->festival);
				$festival = $festivales_controller->getById($entrada->festival);
				require "views/admin_entradas/form_descuentos.php";
			}else{
				require "views/admin_entradas/form_anular.php";
			}
		}elseif (isset($mensaje["enviar_descuentos"])){
			//Ya ingresaron los descuentos, muestro el resumen final, para que el cajero le cobre al cliente
			$festival =  $festivales_controller->getById($mensaje["festival"]);
			if($entrada->estado == 0){
				if(isset($mensaje["descuentos"])){
					$entradas_controller->agregar_descuentos($mensaje["descuentos"],$entrada);
				}
				require "views/admin_entradas/form_confirmar_compra.php";
			}else{
				require "views/admin_entradas/form_anular.php";
			}
		}elseif (isset($mensaje["compra_final"])){
			//Ya se pago, se envia a imprimir
			if($entrada->estado == 0){
				$entrada->set_estado(1);
				//Aca iria el envio a impresora con numero fiscal
				require "views/admin_entradas/form_enviar_impresora.php";
			}else{
				require "views/admin_entradas/form_anular.php";
			}
		}elseif (isset($mensaje["compra_cancelar"])){
			//Se aplicaron los descuentos, pero el cliente no pago
			$entradas_controller->eliminar_descuentos($entrada);
			header('Location: ');	
		}elseif (isset($mensaje["entrada_anular"])){
			//Entrada se devolvio
			$precioDevolver = $entradas_controller->calcular_precio($entrada);
			$entradas_controller->eliminar_descuentos($entrada);
			$entrada->set_estado(0);
			require "views/admin_entradas/anular_sumario.php";
		}elseif (isset($mensaje["consultar_sector_recital"])){
			//Seleccion de fila y columna, requiere sector, recital y festival
			$sector = new Sector($mensaje["sector"]);
			$recital = new Recital($mensaje["recital"],$mensaje["festival"]);
			$festival =  $festivales_controller->getById($recital->festival);
			$cantidad_filas = $sector->cantidad_filas;
			$cantidad_columnas = $sector->cantidad_columnas;
			$entradas = $entradas_controller->get_all($sector->nombre,$recital->festival,$recital->fecha);
			require "views/admin_entradas/form_fila_col.php";
		}elseif (isset($mensaje["consultar_festival"])){
			//Seleccion de sector y recital, requiere festival en el POST
			$festival =  $festivales_controller->getById($mensaje["festival"]);
			$recitales = $recitales_controller->get_all($festival->getId());
			$sectores = $sectores_controller->get_all();
			require "views/admin_entradas/form_fecha_sector.php";
		}else{
			//Seleccion del festival
			$festivales = $festivales_controller->get_all();
			require "views/form_festivales.php";
		}
		echo '<input type="hidden" name="adminEntradas" value=""\>';
	}
} 
?>
