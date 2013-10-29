<div>Festival <?php echo $festival->nombre;?></div>
<div>Seleccione Fecha</div>
<select name="recital">
<?php
foreach ($recitales as $recital) {
	$date = new DateTime($recital["fecha"]); 
	$fecha_mostrar = $date->format('d-m-Y');
	echo "<option value=\"".$recital["fecha"]."\">".$fecha_mostrar."</option>";
}
?>
</select>
<input type="hidden" name="festival" value="<?php echo $mensaje["festival"];?>"\>
<input type="submit" name="consultar_sector_recital" value="Seleccionar">
