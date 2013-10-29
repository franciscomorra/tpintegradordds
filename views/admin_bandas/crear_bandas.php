<tr>
	<td>
		<input type="text" name="nombre"/>
	</td>
	<td>
		<select name="genero">
		<?php
			foreach ($generos as $genero) {
			echo "<option value=\"".$genero["id"]."\">".$genero["nombre"]."</option>";
		}
		?>
		</select><br/>
	</td>
	<td>
		<input type="submit" name="crear_banda" value="Crear">
	</td>
</tr>