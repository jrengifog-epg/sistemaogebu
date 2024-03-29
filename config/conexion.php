<?php
function con (){
	
		$usuario = "root";
	   	$password = "";
	    $servidor = "localhost";
	    $basededatos = "db_ogebu_gratis";
		// $usuario = "bienestar";
	   	// $password = "BienestarAPP";
	    // $servidor = "localhost";
	    // $basededatos = "bd_dbu";
		$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
		mysqli_query ($conexion,"SET NAMES 'utf8'");
		$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		return $conexion;	
		mysqli_close($conexion);
	
}
?>