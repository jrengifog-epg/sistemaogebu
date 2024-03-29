<?php
require_once "./config/configGeneral.php";
require_once "./controlador/vistasControlador.php";
$plantilla = new vistasControllers();
$plantilla-> obtener_plantilla_controlador();
