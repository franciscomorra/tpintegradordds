<input type="hidden" name="sector" value="<?php echo $mensaje["sector"];?>"\>
<input type="hidden" name="recital" value="<?php echo $mensaje["recital"];?>"\>
<input type="hidden" name="festival" value="<?php echo $mensaje["festival"];?>"\>
<input type="hidden" name="fila" value="<?php echo $mensaje["fila"];?>"\>
<input type="hidden" name="columna" value="<?php echo $mensaje["columna"];?>"\>
<input type="hidden" name="precioBaserecital" value="<?php echo $mensaje["precioBaserecital"];?>"\>
<input type="hidden" name="precio_agregadoSector" value="<?php echo $mensaje["precio_agregadoSector"];?>"\>
<div>Verifique el pago de la entrada</div>
<?php
	$date = new DateTime($mensaje["recital"]); 
	$fecha_modificada = $date->format('d-m-Y');
?>
<div>Festival : <?php echo $festival->getNombre();?></div>
<div>Fecha : <?php echo $fecha_modificada;?></div>
<div>Sector : <?php echo $mensaje["sector"];?></div>
<div>Fila : <?php echo $mensaje["fila"];?></div>
<div>Columna : <?php echo $mensaje["columna"];?></div>

<div>Precio Base : <?php echo $mensaje["precioBaserecital"];?></div>
<div>Precio Sector : <?php echo $mensaje["precio_agregadoSector"];?></div>

<?php
	$precioTotal = $mensaje["precio_agregadoSector"] + $mensaje["precioBaserecital"];
?>
<div>Subtotal : <?php echo $precioTotal;?></div>
<?php
	$precioTotalDescuentos = $precioTotal;
	if(isset($mensaje["descuentos"])){
		foreach ($mensaje["descuentos"] as $descuento => $valor) {
			echo '<input type="hidden" name="descuentos["'.$descuento.'"]" value="'.$valor.'"\>';
			$descuentoAplicable = $precioTotal * $valor / 100;
			$precioTotalDescuentos = $precioTotalDescuentos - $descuentoAplicable;
		}
	}
?>

<div>Total menos descuentos : <b><?php echo $precioTotalDescuentos;?></b></div>
<input type="submit" name="compra_cancelar" value="No pago y se fue corriendo!">
<input type="submit" name="compra_final" value="Pagado!">
