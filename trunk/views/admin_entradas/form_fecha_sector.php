<script type="text/javascript">

    function checkLimit(limit){
        seleccion = document.getElementById('recital');
        if(parseInt(seleccion.value) == 0 ) {
            document.getElementById('consultar_sector_recital').disabled = true;
            return;
        }
        hoy = new Date();
        vencimiento = new Date(seleccion.value);
        vencimiento.setDate(vencimiento.getDate() - limit);
        if(  hoy.getTime() > vencimiento.getTime()){
            document.getElementById('sector').disabled = true;
            document.getElementById('consultar_sector_recital').disabled = true;
            document.getElementById('sector_title').innerHTML = 'Cancelado';
        }else{
            document.getElementById('sector').disabled = false;
            document.getElementById('consultar_sector_recital').disabled = false;
            document.getElementById('sector_title').innerHTML = 'Seleccione Sector';
        }
    }


</script>


<div>Festival <?php echo $festival->getNombre();?></div>

<div>Seleccione Fecha</div>
<select name="recital" id="recital" onchange="checkLimit(<?php echo $festival::LIMIT; ?>)">
<option value=0 selected='selected' > Seleccione Fecha </option>

<?php

foreach ($recitales as $recital) {
	$date = new DateTime($recital["fecha"]); 
	$fecha_mostrar = $date->format('d-m-Y');
	echo "<option value=\"".$recital["fecha"]."\">".$fecha_mostrar." ($ ".$recital["precioBase"].")</option>";
}
?>
</select>
<div id="sector_title">Seleccione Sector</div>
<select name="sector" id="sector" >
<?php
	foreach ($sectores as $sector) {
	echo "<option value=\"".$sector["nombre"]."\">".$sector["nombre"]." - ".$sector["color"]." ($ ".$sector["precio_agregado"].")</option>";
}
?>
</select><br/>
<input type="hidden" name="festival" value="<?php echo $mensaje["festival"];?>"\>
<input type="submit" disabled='disabled' name="consultar_sector_recital" id="consultar_sector_recital" value="Seleccionar">
