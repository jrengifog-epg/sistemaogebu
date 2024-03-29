<?php

require_once "./modelo/vistasModelo.php";
class vistasControllers extends vistasModels{
    
    public function obtener_plantilla_controlador()
    {
       return require_once "./vistas/layaut.php";
    }
    

    public function obtener_vistas_controlador()
    {
        if (isset($_GET['view'])) {
            $ruta=explode("/", $_GET['view']);
            if(count($ruta) < 3){
               
                $respuesta=vistasModels::obtener_vistas_modelo($ruta[0]);
            }else{
                $respuesta="404";
            }
        }else {
            $respuesta="login";
        }
        return $respuesta;
    }

    
}