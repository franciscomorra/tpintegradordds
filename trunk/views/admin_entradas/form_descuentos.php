<div>Entrada Disponible!</div>
<div>Precio Base : $<?php echo $recital->precioBase; ?></div>
<div>Precio Agregado Sector : $<?php echo $sector->precio_agregado;?></div>
<div>Seleccione Descuentos a aplicar</div>
<input type="hidden" name="sector" value="<?php echo $_POST["sector"];?>"\>
<input type="hidden" name="recital" value="<?php echo $_POST["recital"];?>"\>
<input type="hidden" name="festival" value="<?php echo $_POST["festival"];?>"\>
<input type="hidden" name="fila" value="<?php echo $_POST["fila"];?>"\>
<input type="hidden" name="columna" value="<?php echo $_POST["columna"];?>"\>
<input type="hidden" name="precioBaserecital" value="<?php echo $recital->precioBase;?>"\>
<input type="hidden" name="precio_agregadoSector" value="<?php echo $sector->precio_agregado;?>"\>
<?php
    foreach ($descuentos as $descuento) {
		echo '<input type="checkbox" name=descuentos['.$descuento["id_descuento"].']" value="'.$descuento["porcentaje"].'"><span>'.$descuento["tipo"].' : '.$descuento["porcentaje"]. ' %</span><br/>';
    }
?>
<input type="submit" name="enviar_descuentos" value="Confirmar!">
<input type="hidden" name="adminEntradas" value=""\>


