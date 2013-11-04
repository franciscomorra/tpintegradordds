<?php
	foreach ($bandas as $banda)
	{
?>
	<tr>
		<td><?php echo $banda["nombre_banda"];?></td>
		<td><?php echo $banda["nombre_genero"];?></td>
		<td>
			<input type="submit" name="borrar" value="Borrar"/>
			<input type="hidden" name="id_banda" value="<?php echo $banda["id"];?>"/>
			
		</td>
	</tr>

<?php
		
	}
?>
