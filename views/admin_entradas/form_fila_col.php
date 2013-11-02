<div>
Seleccione ubicacion para el festival 
<?php echo $festival->getNombre(); ?>,
recital de la fecha 
<?php echo $recital->fecha; ?>, 
sector <?php echo $sector->nombre;?> (<?php echo $sector->color;?>)

</div>
<input type="hidden" name="sector" value="<?php echo $sector->nombre;?>"\>
<input type="hidden" name="festival" value="<?php echo $recital->festival;?>"\>
<input type="hidden" name="recital" value="<?php echo $recital->fecha;?>"\>
<input type="hidden" name="adminEntradas" value=""\>
<span>Fila:</span>
<select name="fila">
<?php
for ($columna = 1; $columna<=$sector->cantidad_filas;$columna++){
    echo "<option value=".$columna.">".$columna."</option>";
}
?>
</select>
</br>
<span>Columna:</span>
<select name="columna">
<?php
for ($columna = 1; $columna<=$sector->cantidad_columnas;$columna++){
    echo "<option value=".$columna.">".$columna."</option>";
}
?>
</select><br/>
<input type="submit" name="consultar_butaca" value="Enviar!">
<?php

echo ' <table width = "100%" border = "0" align = "center">';
echo '<th>&nbsp;</th>';
for ($columna = 1; $columna<=$sector->cantidad_columnas;$columna++){
	echo '<th >';
	if($columna<10){echo '0';}
	echo $columna.'</th>';
}
$entradaActual = NULL;
for ($fila = 1; $fila<=$sector->cantidad_filas;$fila++){
	echo '<tr>';
	echo '<td>'.$fila.'</td>';
	for ($columna = 1; $columna<=$sector->cantidad_columnas;$columna++){
		foreach ($entradas as $entrada){
			if($entrada["columna"] == $columna && $entrada["fila"] == $fila){
				$entradaActual = $entrada;
			}
		}
		if($entradaActual["estado"]==0){
			echo '<td bgcolor="Green">&nbsp; </td>';
		}else{
			echo '<td bgcolor="Red">&nbsp; </td>';
		}
	}
	echo '</tr>';
}
echo '</table>';

?>

