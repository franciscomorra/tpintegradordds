<div>Entrada No disponible!<br/></div>
<?php
	$date = new DateTime($entrada->fecha_alta);
	$fecha_modificada = $date->format('d-m-Y');
	$hora_modificada = $date->format('H:i:s');
?>
<div>Entrada vendida el <?php echo $fecha_modificada;?> a las <?php echo $hora_modificada;?></div>

<input type="hidden" name="sector" value="<?php echo $mensaje["sector"];?>"\>
<input type="hidden" name="recital" value="<?php echo $mensaje["recital"];?>"\>
<input type="hidden" name="festival" value="<?php echo $mensaje["festival"];?>"\>
<input type="hidden" name="fila" value="<?php echo $mensaje["fila"];?>"\>
<input type="hidden" name="columna" value="<?php echo $mensaje["columna"];?>"\>
<input type="submit" name="entrada_anular" value="Anular Entrada">
<input type="submit" name="" value="Volver">