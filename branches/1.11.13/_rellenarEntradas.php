<?php
function rellenar_entradas($sectores,$recitales){ 
    /*Sirve solo para cuando se carga por primera vez*/
    $mysqli = crearConexion();
    $mysqli->autocommit(FALSE);
    foreach ($recitales as $recital){
        foreach ($sectores as $sector){
            for ($columna = 1; $columna<=$sector["cantidadColumnas"];$columna++){
                for ($fila = 1; $fila<=$sector["cantidadFilas"];$fila++){
                    $stringQuery = "
                    INSERT INTO  `integrador`.`entradas` (
                            `numero` ,
                            `estado` ,
                            `fila` ,
                            `columna` ,
                            `fecha_alta` ,
                            `PrecioVenta` ,
                            `sector` ,
                            `Recital`
                            )
                            VALUES (
                            NULL , '0' ,  '".$fila."',  '".$columna."', 
                            CURRENT_TIMESTAMP , NULL ,  '".$sector["Nombre"]."',  '".$recital["fecha"]."'
                            );
                    ";
                    print_r($stringQuery);
                    echo '<br/>';
                    $mysqli->query($stringQuery);
                }
            }
        }
    }
    $mysqli->commit();
    $mysqli->close(); 
}
?>