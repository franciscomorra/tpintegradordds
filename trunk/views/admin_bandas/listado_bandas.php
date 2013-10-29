<?php
	foreach ($bandas as $item)
	{
?>
	<tr>
		<td><?php echo $item["nombre_banda"];?></td>
		<td><?php echo $item["nombre_genero"];?></td>
		<td>
			<input type="submit" name="borrar" value="Borrar"/>
			<input type="hidden" name="id_banda" value="<?php echo $item["id_banda"];?>"/>
		</td>
	</tr>

<?php
		
	}
?>
