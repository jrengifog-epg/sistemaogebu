<?php
require_once '../config/conexion.php';
require_once '../config/configGeneral.php';
require_once '../vistas/lib/barcode.php';
    $conexion = con();
    $consulta="SELECT id_alumno FROM alumnos";
    $rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    while ($row=mysqli_fetch_assoc($rspta)){
        $code=$row['id_alumno'];
        barcode('../vistas/img/codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
    }