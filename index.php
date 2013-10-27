<html>
<body>
<form action="" method="POST">
<?php
include_once "/controllers/admin_entradas_controller.php";
include_once "/controllers/admin_bandas_controller.php";
include_once "/controllers/admin_horarios_controller.php";
include_once "funcionesEspeciales.php";
//vaciar_todo(); //Resetea todas las compras de entradas
//borrar_descuentos_vacios();
//rellenar_entradas();//NO CORRER MAS DE UNA VEZ!

if (isset($_POST["adminEntradas"])){
    $admin = new AdminEntradas();
	$admin->handleRequest($_POST);
}elseif (isset($_POST["adminBandas"])){
    $admin = new AdminBandas();
	$admin->handleRequest($_POST);
}elseif (isset($_POST["adminHorarios"])){
	$admin = new AdminHorarios();
	$admin->handleRequest($_POST);
}else{
	include_once "/views/mainview.php";
}
?>
</form>
</body>
</html>