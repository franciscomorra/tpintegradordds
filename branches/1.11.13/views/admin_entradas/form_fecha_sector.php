
<div>Festival <?php echo $festival->nombre;?></div>

<div>Seleccione Fecha</div>
<select name="recital">
<?php
foreach ($recitales as $recital) {
	$date = new DateTime($recital["fecha"]); 
	$fecha_mostrar = $date->format('d-m-Y');
	echo "<option value=\"".$recital["fecha"]."\">".$fecha_mostrar." ($ ".$recital["precioBase"].")</option>";
}
?>
</select>
<div>Seleccione Sector</div>
<select name="sector">
<?php
	foreach ($sectores as $sector) {
	echo "<option value=\"".$sector["nombre"]."\">".$sector["nombre"]." - ".$sector["color"]." ($ ".$sector["precio_agregado"].")</option>";
}
?>
</select><br/>
<input type="hidden" name="festival" value="<?php echo $mensaje["festival"];?>"\>
<input type="submit" name="consultar_sector_recital" value="Seleccionar">
