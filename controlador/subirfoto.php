<?php 
$_FILES['foto']['name'] = $_POST['dni'].".jpg";
 move_uploaded_file($_FILES['foto']['tmp_name'],'../vistas/img/alumnos/'.$_FILES['foto']['name'] );
 //$_FILES['archivo']['name']
?>
