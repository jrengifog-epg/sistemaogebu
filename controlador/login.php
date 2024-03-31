<?php

require_once '../config/conexion.php';
require_once '../config/configGeneral.php';
$conexion = con();
$datos_persona = [
    'nombres' => '',
    'apellidos' => '',
    'rol' => '',
    'login' => false
];
$usuario = $_POST["usuario"];
$password = $_POST["clave"];
$consulta="SELECT * FROM personas  WHERE usuario='".$usuario."' and clave='".$password."'";
$dato =mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");;
$result =mysqli_fetch_array($dato);
if($result){ 
        
        ob_start();
        session_start();
        $_SESSION['id']=$result["id_persona"];
        $_SESSION['dni']=$result["dni"];
        $_SESSION['nombres'] =$result["nombres"];
        $_SESSION['apellidos'] =$result["apellidos"];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $result["id_rol"];;
        $datos_persona['nombres'] = $result['nombres'];
        $datos_persona['apellidos'] = $result['apellidos'];
        $datos_persona['rol'] = $result["id_rol"];
        $datos_persona['login'] = true;

}else{
        $consulta1="SELECT * FROM alumnos   WHERE usuario='".$usuario."' and clave ='".$password."'";
        $dato1 =mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");;
        $result1 =mysqli_fetch_array($dato1);
        if($result1){ 
                ob_start();
                session_start();
                $_SESSION['id']=$result1["id_alumno"];
                $_SESSION['dni']=$result1["dni"];
                $_SESSION['nombres'] =$result1["nombres"];
                $_SESSION['apellidos'] =$result1["apellidopaterno"]." ".$result1["apellidomaterno"];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['rol'] =  $result1["id_rol"];
                $datos_persona['nombres'] = $result1['nombres'];
                $datos_persona['apellidos'] = $result1["apellidopaterno"]." ".$result1["apellidomaterno"];
                $datos_persona['rol'] =  $result1["id_rol"];
                $datos_persona['login'] = true;
        
        }else{
            $datos_persona['login'] = false;
        }
}
       
   header('Content-Type: application/json');
   echo json_encode($datos_persona);
?>