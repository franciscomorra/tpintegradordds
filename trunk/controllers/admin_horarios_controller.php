<?php
//include_once "functions.php";
include_once "controllers/database_controller.php";

class AdminHorarios {

    function __construct($entityManager){
        $this->entityManager = $entityManager;
    }

    function handleRequest($mensaje) {
		$bandasManager = new Bandas_Controller();
        $festivales_controller = new Festivales_Controller($this->entityManager);

		if(isset($mensaje["consultar_festival"])){
			$festival = $festivales_controller->getById($mensaje["festival"]);
			$recitales_controller = new Recitales_Controller();
			$recitales = $recitales_controller->get_all($festival->getId());
			require "views/admin_horarios/form_fecha_sector.php";
		}elseif (isset($mensaje["consultar_sector_recital"])){
			$festival = $festivales_controller->getById($mensaje["festival"]);
			$recital = new Recital($mensaje["recital"],$mensaje["festival"]);
			$bandas = $bandasManager->getAll();
			require "views/admin_horarios/generar_diagramacion_encabezado.php";
			require "views/admin_horarios/agregar_nueva_banda.php";
		}elseif (isset($mensaje["agregar"])){
			$festival = $festivales_controller->getById($mensaje["festival"]);
			$recital = new Recital($mensaje["recital"],$mensaje["festival"]);
			$orden = 0;
			$bandas = $bandasManager->getAll();
			$recital ->AgregarBanda($mensaje["banda"],$orden);
			echo "Banda agregada!";
			require "views/admin_horarios/generar_diagramacion_encabezado.php";
			require "views/admin_horarios/agregar_nueva_banda.php";
		}else{
			$festivales = $festivales_controller->get_all();
			require "views/form_festivales.php";
		}
		echo '<input type="hidden" name="adminHorarios" value=""\>';
	}
} 
?>
