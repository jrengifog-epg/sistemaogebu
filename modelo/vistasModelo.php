<?php 
    class vistasModels
    {
        protected function obtener_vistas_modelo($vistas)
        {
            # code...
            $listaBlanca=["404","menu"];
            if (in_array($vistas, $listaBlanca)) {
                # code...
                if (is_file("./vistas/contenidos/".$vistas."-view.php")) {
                    # code...
                    $contenido="./vistas/contenidos/".$vistas."-view.php";
                }else {
                    # code...
                    $contenido="login";
                }
            }elseif ($vistas=="login") {
                # code...
                $contenido="login";
            }elseif ($vistas=="login") {
                # code...
                $contenido="login";
            
            }else
            {
                # code...
                $contenido="404";
            }
            return $contenido;
        }    

        
    }
    
     
     