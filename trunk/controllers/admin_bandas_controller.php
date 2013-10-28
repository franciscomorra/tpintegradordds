<?php
include_once "/controllers/database_controller.php";
include_once "/controllers/bandas_controller.php";
include_once "/controllers/generos_controller.php";
include_once "/controllers/banda.php";
include_once "/controllers/genero.php";

class AdminBandas {
	function handleRequest($mensaje) {
		$bandasManager = new Bandas_Controller();
		$generosManager = new Generos_Controller();
		if(isset($mensaje["borrar"]) && isset($mensaje["id_banda"])){
			$banda = new Banda();
			$banda->id = $mensaje["id_banda"];
			$banda->delete_banda();
		
		}elseif (isset($mensaje["crear_banda"])){
			//print_r($mensaje);
			if($mensaje["nombre"]==NULL){
				echo ("Nombre no debe ser nulo");
			}else{
				$banda = new Banda();
				$banda->nombre = $mensaje["nombre"];
				$banda->genero = new Genero();
				$banda->genero->id = $mensaje["genero"];
				$banda->create_banda();
			}		
		}elseif (isset($mensaje["modificacion"])){
		}else{
		}
		echo "<table border=0 width=50% height=20%>";
		echo "
		<tr>
			<th>Banda</th>
			<th>Genero</th>
		</tr>
		";
		$bandas = $bandasManager->getAll();
		$generos = $generosManager->getAll();
				require "views/admin_bandas/crear_bandas.php";
		if($bandas!=NULL){
			require "views/admin_bandas/listado_bandas.php";
		}

		echo "</table>";
	}
} 
?>
