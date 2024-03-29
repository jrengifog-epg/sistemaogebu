<?php //Validamos si existe realmente una sesión activa o no 
    if(empty($_SESSION['id']))
    { 
    //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
        echo "<script type='text/javascript'> window.location.href = 'http://localhost/monitoreo/';</script>";
    exit(); 
    }
?>

