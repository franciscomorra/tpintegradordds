<script type="text/javascript">

    function setBandAndSubmit(id_banda){
        var thedoc = document.getElementById('fest_form');
        var element = document.createElement('input')
        element.setAttribute("type", "text");
        element.setAttribute("name", "borrar");
        thedoc.appendChild(element);

        document.getElementById('id_banda').setAttribute("value", id_banda);
        thedoc.submit();
    }

</script>


<?php
	foreach ($bandas as $banda)
	{
?>
	<tr>
		<td><?php echo $banda["nombre_banda"];?></td>
		<td><?php echo $banda["nombre_genero"];?></td>
		<td>
			<input type="button" name="buttonBorrar" value="Borrar"
                   onclick="setBandAndSubmit(<?php echo $banda["id"];?>)" />

        </td>
    </tr>

    <?php

	}
?>
<input type="hidden" name="id_banda" id="id_banda"/>

