<div>Seleccione Festival</div>
<select name="festival">
<?php
	foreach ($festivales as $festival) {
	echo "<option value=\"".$festival["id_festival"]."\">".$festival["nombre"]."</option>";
}
?>
</select><br/>
<input type="hidden" name="adminEntradas" value=""\>
<input type="submit" name="consultar_festival" value="Seleccionar">
