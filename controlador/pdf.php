<?php
require_once '../config/conexion.php';
require_once '../config/configGeneral.php';
require_once '../vistas/lib/fpdf.php';
$conexion = con();
$response = array();
$metodo = $_SERVER["REQUEST_METHOD"];
$ruta = implode('/', array_slice(explode("/", $_SERVER["REQUEST_URI"]), 3,1));
$datos = json_decode(file_get_contents("php://input"));

 /**SWITCH */
 switch($metodo){
    case 'GET':
        switch ($ruta) {
               
        }
    break;
    case 'POST':
        switch ($ruta) {
            case 'constanciaSocial': 
                $id_alumno=$datos->id_alumno;
                $consulta="SELECT nombres, apellidopaterno,apellidomaterno, facultad, escuela
                            FROM alumnos where id_alumno=$id_alumno";
                $rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                $row=mysqli_fetch_assoc($rspta);
                if($row){
                    $alumno=$row['nombres'].' '.$row['apellidopaterno'].' '.$row['apellidomaterno'];
                    $facultad=$row['facultad'];
                    $escuela=$row['escuela'];
                }
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->Image('../vistas/img/logo.jpg',20,15,14);
                $pdf->Image('../vistas/img/logo-ogebu.png',180,15,16);
                $pdf->Ln(10);
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(190,5,'UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA',0,1,'C');
                $pdf->Cell(190,5,utf8_decode('DIRECCIÓN DE BIENESTAR UNIVERSITARIO'),0,1,'C');
                $pdf->SetFont('Arial','BI',9);
                $pdf->Cell(190,5,utf8_decode('Calle Nanay N° 363 Telefono:235699'),0,1,'C');
                $pdf->Ln(10);
                $pdf->SetFont('Arial','BIU',14);
                $pdf->Cell(190,5,'CONSTANCIA',0,1,'C');
                $pdf->Ln(8);
                $pdf->SetFont('Arial','I',11);
                $pdf->SetLeftMargin(30);
                $pdf->SetRightMargin(30);
                $pdf->MultiCell(150,5,utf8_decode('El area de Servicio Social, hace constar que el (la) alumno (a) '.$alumno.' de la facultad de '.$facultad.', Escuela Profesional de '.$escuela.' ha cumplido con la Entrevista Personal y el llenado de la ficha Socio Económica.'),0,'J',false);
                $pdf->Image('../vistas/img/firma-social.jpg',75,100,70);
                $pdf->SetY(150);
                $pdf->SetFont('Arial','I',11);
                $pdf->Cell(150,5,'Iquitos, '.date('d').' de '.date('M').' del '.date('Y') ,0,1,'R');	
                $pdf->Image('../vistas/img/codigos/'.$id_alumno.'.png',20,170,30,0,'png');
                $pdf->Output('I','Ficha Social-'.$id_alumno.'.pdf',true);   
            break;
            case 'fichaSocial': 
                $id_alumno=$datos->id_alumno;
                /** Alumno */
                $consulta0="SELECT nombres, apellidopaterno, apellidomaterno, dni, escuela, facultad, ingreso
                            FROM alumnos where id_alumno=$id_alumno";
                $rspta0=mysqli_query( $conexion, $consulta0 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                $row0=mysqli_fetch_assoc($rspta0);
                if($row0){
                    $nombres=$row0['nombres'];
                    $apellidoPaterno=$row0['apellidopaterno'];
                    $apellidoMaterno=$row0['apellidomaterno'];
                    $dni=$row0['dni'];
                    $ingreso=$row0['ingreso'];
                    $facultad=$row0['facultad'];
                    $escuela=$row0['escuela'];
                }
                /** Informacion personal alumno */
                $consulta1="SELECT foto, sexo, fecha_nacimiento, codigo_universitario, region_nacimiento, provincia_nacimiento, 
                            distrito_nacimiento, estado_civil, direccion, distrito_direccion, referencia, telefono, celular, 
                            correo, lugar, region_procedencia, provincia_procedencia, distrito_procedencia
                            FROM informacion_personal  where id_alumno=$id_alumno";
                $rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                $row1=mysqli_fetch_assoc($rspta1);
                if($row1){
                    $foto=$row1['foto'];
                    $fecha_nacimiento=$row1['fecha_nacimiento'];
                    $codigo_universitario=$row1['codigo_universitario'];
                    $direccion=$row1['direccion'];
                    $referencia=$row1['referencia'];
                    $distrito_direccion=$row1['distrito_direccion'];
                    $telefono=$row1['telefono'];
                    $celular=$row1['celular'];
                    $correo=$row1['correo'];
                    #region sexo
                        if($row1['sexo'] == 1){
                            $sexo='MASCULINO';
                        } else{
                            $sexo='FEMENINO';
                        }
                    #endregion sexo
                    
                    #region ESTADO CIVIL
                        if($row1['estado_civil'] == 1){
                            $estado_civil='SOLTERO(A)';
                        } else if($row1['estado_civil'] == 2){
                            $estado_civil='CONVIVIENTE';
                        } else if($row1['estado_civil'] == 3){
                            $estado_civil='SEPARADO(A)';
                        } else if($row1['estado_civil'] == 4){
                            $estado_civil='CASADO(A)';
                        } else if($row1['estado_civil'] == 5){
                            $estado_civil='VIUDO(A)';
                        } else if($row1['estado_civil'] == 6){
                            $estado_civil='DIVORCIADO(A)';
                        }
                    #endregion estado civil
                }
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->Image('../vistas/img/logo.jpg',20,15,14);
                $pdf->Image('../vistas/img/logo-ogebu.png',180,15,16);
                $pdf->Ln(10);
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell(190,5,'UNIVERSIDAD NACIONAL DE LA AMAZONIA PERUANA',0,1,'C');
                $pdf->Cell(190,5,utf8_decode('DIRECCIÓN DE BIENESTAR UNIVERSITARIO'),0,1,'C');
                $pdf->SetFont('Arial','BI',9);
                $pdf->Cell(190,5,utf8_decode('Calle Nanay N° 363 Telefono:235699'),0,1,'C');
                $pdf->Ln(10);
                $pdf->SetFont('Arial','BU',12);
                $pdf->Cell(190,5,'FICHA SOCIO-ECONOMICA',0,1,'C');
                $pdf->Ln(5);
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 1. INFORMACIÓN PERSONAL'),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(125,5,utf8_decode(' NOMBRES'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(125,5,utf8_decode($nombres),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode(' APELLIDO PATERNO'),1,1,'C');
                $pdf->SetXY(82,71);
                $pdf->Cell(63,5,utf8_decode(' APELLIDO MATERNO'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode($apellidoPaterno),1,1,'C');
                $pdf->SetXY(82,76);
                $pdf->Cell(63,5,utf8_decode($apellidoMaterno),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode(' DNI'),1,1,'C');
                $pdf->SetXY(82,81);
                $pdf->Cell(63,5,utf8_decode(' FECHA NACIMIENTO'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode($dni),1,1,'C');
                $pdf->SetXY(82,86);
                $pdf->Cell(63,5,utf8_decode($fecha_nacimiento),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode(' SEXO'),1,1,'C');
                $pdf->SetXY(82,91);
                $pdf->Cell(63,5,utf8_decode(' ESTADO CIVIL'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode($sexo),1,1,'C');
                $pdf->SetXY(82,96);
                $pdf->Cell(63,5,utf8_decode($estado_civil),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode('  AÑO INGRESO'),1,1,'C');
                $pdf->SetXY(82,101);
                $pdf->Cell(63,5,utf8_decode(' CODIGO UNIVERSITARIO'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(62,5,utf8_decode($ingreso),1,1,'C');
                $pdf->SetXY(82,106);
                $pdf->Cell(63,5,utf8_decode($codigo_universitario),1,1,'C');
                $pdf->Image('../vistas/img/alumnos/'.$foto,152,63,35);
                $pdf->SetXY(145,61);
                $pdf->Cell(50,50,'',1,1,'R');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(88,5,utf8_decode('  FACULTAD'),1,1,'C');
                $pdf->SetXY(108,111);
                $pdf->Cell(87,5,utf8_decode(' ESCUELA'),1,1,'C');
                $pdf->SetFont('Arial','',8);
                $pdf->SetX(20);
                $pdf->Cell(88,5,utf8_decode($facultad),1,1,'C');
                $pdf->SetXY(108,116);
                $pdf->Cell(87,5,utf8_decode($escuela),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('DIRECCIÓN'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode($direccion),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(100,5,utf8_decode('REFERENCIA'),1,1,'C');
                $pdf->SetXY(120,131);
                $pdf->Cell(75,5,utf8_decode('DISTRITO'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(100,5,utf8_decode($referencia),1,1,'C');
                $pdf->SetXY(120,136);
                $pdf->Cell(75,5,utf8_decode($distrito_direccion),1,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->SetX(20);
                $pdf->Cell(58,5,utf8_decode('TELEFONO'),1,1,'C');
                $pdf->SetXY(78,141);
                $pdf->Cell(58,5,utf8_decode('CELULAR'),1,1,'C');
                $pdf->SetXY(136,141);
                $pdf->Cell(59,5,utf8_decode('CORREO'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(58,5,utf8_decode($telefono),1,1,'C');
                $pdf->SetXY(78,146);
                $pdf->Cell(58,5,utf8_decode($celular),1,1,'C');
                $pdf->SetXY(136,146);
                $pdf->Cell(59,5,utf8_decode($correo),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 2. INFORMACIÓN EDUCACIONAL'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 3. INFORMACIÓN FAMILIAR'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 4. INFORMACIÓN ECONOMIA'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 5. INFORMACIÓN VIVIENDA'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 6. INFORMACIÓN SALUD'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->SetFont('Arial','B',11);
                $pdf->SetX(20);
                $pdf->Cell(175,6,utf8_decode(' 7. INFORMACIÓN RECREACIÓN Y CULTURA'),1,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->SetX(20);
                $pdf->Cell(175,5,utf8_decode('PROXIMAMENTE'),1,1,'C');
                $pdf->Output('I','Ficha Social-'.$id_alumno.'.pdf',true);  
            break;
            
        }
    break;
    case 'PUT':
        switch ($ruta) {

        }
    break;
    case 'DELETE':
        switch ($ruta) {
            
        }
    break;
}

?>