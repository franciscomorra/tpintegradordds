<div>Seleccione Festival</div>
<select name="festival">
<?php
	foreach ($festivales as $festival) {
	echo "<option value=\"".$festival->getId()."\">".$festival->getNombre()."</option>";
}
?>
</select><br/>
<input type="submit" name="consultar_festival" value="Seleccionar">
