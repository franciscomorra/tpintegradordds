<div>Agregar Nueva Banda 
	<select name="banda">
	<?php
	foreach ($bandas as $banda) {
		echo "<option value=\"".$banda["id"]."\">".$banda["nombre_banda"]."</option>";
	}
	?>	
	</select>
	<input type="submit" name="agregar" value="Agregar"/>
</div>
