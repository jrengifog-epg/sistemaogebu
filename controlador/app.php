<?php
    require '../config/conexion.php';
    require '../config/configGeneral.php';
    /** VARIABLES */
	$conexion=con();
	$response = array();
    $metodo = $_SERVER["REQUEST_METHOD"];
	$ruta = implode('/', array_slice(explode("/", $_SERVER["REQUEST_URI"]), 4,1));
	$datos = json_decode(file_get_contents("php://input"));
    function console_log( $data ){
		echo '<script>';
		echo 'console.log('. $data .')';
		echo '</script>';
	  }
	  
    /**SWITCH */
    switch($metodo){
		case 'GET':
			switch ($ruta) {
				case 'region': 
					$consulta="SELECT cod_region,nombre_ubigeo FROM ubigeo where cod_provincia ='00' and cod_distrito='00'";
            		$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'provincia': 
					$id_region = implode('/', array_slice(explode("/", $_SERVER["REQUEST_URI"]), 5,1));
					$consulta="SELECT cod_provincia,nombre_ubigeo FROM ubigeo where  cod_region='$id_region' and cod_provincia !='00' and cod_distrito='00'";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'distrito': 
					$id_region = implode('/', array_slice(explode("/", $_SERVER["REQUEST_URI"]), 5,1));
					$id_provincia = implode('/', array_slice(explode("/", $_SERVER["REQUEST_URI"]), 6,1));
					$consulta="SELECT cod_distrito,nombre_ubigeo FROM ubigeo where  cod_region='$id_region' and cod_provincia ='$id_provincia' and cod_distrito !='00'";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'roles': 
					$consulta="SELECT * FROM roles";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				/**nuevos */
				case 'facultades': 
					$consulta="SELECT DISTINCT a.facultad FROM alumnos a ORDER BY a.facultad ASC";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				
			}
		break;
		case 'POST':
			switch ($ruta) {
				case 'countinfopersonal': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_personal
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinfoeducacional': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_educacional
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinfofamiliar': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_familiar
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinfoeconomica': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM ingresos
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinfovivienda': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_vivienda
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinfosalud': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_salud
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countinforecreacion': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM informacion_recreacion_cultura
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'guardarinfopersonal':
					$foto = $datos->foto;
					$sexo = $datos->sexo;
					$fecha_nacimiento= $datos->fecha_nacimiento;
					$codigo_universitario= $datos->codigo_universitario;
					$region_nacimiento= $datos->region_nacimiento;
					$provincia_nacimiento= $datos->provincia_nacimiento;
					$distrito_nacimiento= $datos->distrito_nacimiento;
					$estado_civil= $datos->estado_civil;
					$direccion= $datos->direccion;
					$distrito_direccion= $datos->distrito_direccion;
					$referencia= $datos->referencia;
					$telefono= $datos->telefono;
					$celular= $datos->celular;
					$correo= $datos->correo;
					$lugar= $datos->lugar;
					$region_procedencia= $datos->region_procedencia;
					$provincia_procedencia= $datos->provincia_procedencia;
					$distrito_procedencia= $datos->distrito_procedencia;
					$id_alumno= $datos->id_alumno;
					//Aquí podríamos acceder a otras propiedades
					$consulta="INSERT INTO informacion_personal (foto,sexo,fecha_nacimiento,codigo_universitario,region_nacimiento, 
							   provincia_nacimiento,distrito_nacimiento,estado_civil,direccion,distrito_direccion,referencia, 
							   telefono,celular,correo,lugar,region_procedencia,provincia_procedencia,distrito_procedencia,id_alumno)
							Values('$foto',$sexo,'$fecha_nacimiento','$codigo_universitario','$region_nacimiento','$provincia_nacimiento','$distrito_nacimiento',
							$estado_civil,'$direccion','$distrito_direccion','$referencia','$telefono','$celular','$correo','$lugar','$region_procedencia','$provincia_procedencia',
							'$distrito_procedencia',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Declaracion_jurada */
					$declaracion_jurada =$datos->declaracion_jurada;
					$consulta1="INSERT INTO declaracion_jurada (declaracion,id_alumno)
							Values($declaracion_jurada,$id_alumno)";
					$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos dj");
					echo json_encode($rspta);
				break;
				case 'guardarinfoeducacional':
					/**Informacion educacional*/
					$fecha_secundaria= $datos->fecha_secundaria;
					$colegio= $datos->colegio;
					$especificacion_colegio= $datos->especificacion_colegio;
					$modalidad= $datos->modalidad;
					$preparacion= $datos->preparacion;
					$especificacion_preparacion= $datos->especificacion_preparacion;
					$otros_estudios= $datos->otros_estudios;
					$otra_universidad= $datos->otra_universidad;
					$especificacion_universidad= $datos->especificacion_universidad;
					$trabajo= $datos->trabajo;
					$dependencia_economica= $datos->dependencia_economica;
					$pension= $datos->pension;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO informacion_educacional (fecha_secundaria, tipo_colegio, especificacion_colegio, modalidad, 
								tipo_preparacion, especificacion_preparacion, otros_estudios, otra_universidad, especificacion_universidad, 
								trabajo, dependencia_economica, pension, id_alumno)
								Values('$fecha_secundaria',$colegio,'$especificacion_colegio',$modalidad,$preparacion,'$especificacion_preparacion',
								$otros_estudios,$otra_universidad,'$especificacion_universidad',$trabajo,$dependencia_economica,$pension,$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Aspectos_universitarios*/
					$aspectos= $datos->aspectos;
					for ($i=0;$i<count($aspectos) ;$i++)      
					{ 

						$consulta1="INSERT INTO aspectos_universidad (id_alumno,aspecto)
						Values($id_alumno,$aspectos[$i])";
						$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						

					} 
					/** Otros_estudios*/
					$tipo_estudio=$datos->tipo_estudio;
					$estudio=$datos->estudio;
					$especificacion_estudio=$datos->especificacion_estudio;
					$nivel_estudio=$datos->nivel_estudio;
					if($otros_estudios==1){
						$consulta2="INSERT INTO otros_estudios (tipo_estudio, estudio, especificacion_estudio, nivel, id_alumno)
									Values($tipo_estudio,$estudio,'$especificacion_estudio',$nivel_estudio,$id_alumno)";
						$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Trabajos */
					$sueldo=$datos->sueldo;
					$centro_trabajo=$datos->centro_trabajo;
					$cargo=$datos->cargo;
					$condicion=$datos->condicion;
					if($trabajo==1){
						$consulta3="INSERT INTO trabajos (sueldo, centro_trabajo, cargo, condicion, id_alumno)
									Values('$sueldo','$centro_trabajo','$cargo',$condicion,$id_alumno)";
						$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Pension */
					$monto=$datos->monto;
					$frecuencia=$datos->frecuencia;
					if($pension==1){
						$consulta4="INSERT INTO pensiones(monto, frecuencia, id_alumno)
									Values('$monto','$frecuencia',$id_alumno)";
						$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Idiomas */
					$arrayidiomas=$datos->arrayidiomas;
					$especificacion_idioma=$datos->especificacion_idioma;
					$nivel_idioma=$datos->nivel_idioma;
					for ($i=0;$i<count($arrayidiomas) ;$i++)      
					{ 
						if($arrayidiomas[$i] == 1){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[0],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 2){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[1],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 3){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[2],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 4){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[3],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 5){
							$consulta5="INSERT INTO otros_idiomas (idioma,especifique,nivel,id_alumno)
							Values($arrayidiomas[$i],'$especificacion_idioma',$nivel_idioma[4],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						
						

					} 
					echo json_encode($rspta);

				break;
				case 'guardarinfofamiliar':
					/**Informacion familiar*/
					$arrayParientes= $datos->arrayParientes;
					$arrayParientes2= $datos->arrayParientes2;
					$residencia_padre= $datos->residencia_padre;
					$direccion_padre= $datos->direccion_padre;
					$telefono_padre= $datos->telefono_padre;
					$residencia_madre= $datos->residencia_madre;
					$direccion_madre= $datos->direccion_madre;
					$telefono_madre= $datos->telefono_madre;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO informacion_familiar (residencia_padre,direccion_padre,telefono_padre,residencia_madre,direccion_madre,telefono_madre,id_alumno)
								Values('$residencia_padre','$direccion_padre','$telefono_padre','$residencia_madre','$direccion_madre','$telefono_madre',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Informacion Parientes*/
					for ($i=0;$i<count($arrayParientes) ;$i++)      
					{ 

						$consulta1="INSERT INTO composicion_familiar (familiar,fecha_nacimiento,parentesco,estado_civil,grado_instruccion,ocupacion,centro_laboral,ingresos,id_alumno)
						Values('
						".$arrayParientes[$i]->familiar."',
						'".$arrayParientes[$i]->parienteEdad."',
						'".$arrayParientes[$i]->parentesco."',
						'".$arrayParientes[$i]->pariente_civil."',
						'".$arrayParientes[$i]->grado_instruccion."',
						'".$arrayParientes[$i]->ocupacion."',
						'".$arrayParientes[$i]->centro_laboral."',
						'".$arrayParientes[$i]->ingreso."',$id_alumno)";
						$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						

					} 
					/**Informacion Parientes 2*/
					for ($i=0;$i<count($arrayParientes2) ;$i++)      
					{ 

						$consulta2="INSERT INTO otros_familiares (familiar,fecha_nacimiento,parentesco,estado_civil,grado_instruccion,ocupacion,centro_laboral,ingresos,id_alumno)
						Values('
						".$arrayParientes2[$i]->familiar."',
						'".$arrayParientes2[$i]->parienteEdad."',
						'".$arrayParientes2[$i]->parentesco."',
						'".$arrayParientes2[$i]->pariente_civil."',
						'".$arrayParientes2[$i]->grado_instruccion."',
						'".$arrayParientes2[$i]->ocupacion."',
						'".$arrayParientes2[$i]->centro_laboral."',
						'".$arrayParientes2[$i]->ingreso."',$id_alumno)";
						$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						

					} 
					echo json_encode($rspta);
				break;
				case 'guardarinfoeconomico':
						/**Ingresos */
						$alquiler_inmueble= $datos->alquiler_inmueble;
						$alquiler_vehiculos= $datos->alquiler_vehiculos;
						$trabajos_eventuales= $datos->trabajos_eventuales;
						$negocio_propio= $datos->negocio_propio;
						$sueldo= $datos->sueldo;
						$pension_viudez= $datos->pension_viudez;
						$pension_orfandad= $datos->pension_orfandad;
						$pension_incapacidad= $datos->pension_incapacidad;
						$pension_alimenticia= $datos->pension_alimenticia;
						$envio_extranjero= $datos->envio_extranjero;
						$envio_provincias= $datos->envio_provincias;
						$ingresos_otros= $datos->ingresos_otros;
						$id_alumno= $datos->id_alumno;
						$consulta="INSERT INTO ingresos (alquiler_inmueble, alquiler_vehiculos, trabajos_eventuales, negocio_propio, sueldo, pension_viudez, pension_orfandad, 
								pension_incapacidad, pension_alimenticia, envio_extranjero, envio_provincias, otros, id_alumno)
								Values('$alquiler_inmueble','$alquiler_vehiculos','$trabajos_eventuales','$negocio_propio','$sueldo','$pension_viudez',
								'$pension_orfandad','$pension_incapacidad','$pension_alimenticia','$envio_extranjero','$envio_provincias','$ingresos_otros',$id_alumno)";
						$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						/**Egresos */
						$alimentacion= $datos->alimentacion;
						$agua= $datos->agua;
						$limpieza= $datos->limpieza;
						$vivienda= $datos->vivienda;
						$egreso_telefono= $datos->egreso_telefono;
						$prestamos= $datos->prestamos;
						$educacion= $datos->educacion;
						$cable= $datos->cable;
						$recreacion= $datos->recreacion;
						$transporte= $datos->transporte;
						$internet= $datos->internet;
						$luz= $datos->luz;
						$salud= $datos->salud;
						$egresos_otros= $datos->egresos_otros;
						$consulta1="INSERT INTO egresos (alimentacion, agua, limpieza, vivienda, telefono, prestamos, educacion, cable, recreacion, transporte, internet, luz, salud, otros, id_alumno)
								Values('$alimentacion','$agua','$limpieza','$vivienda','$egreso_telefono','$prestamos','$educacion','$cable','$recreacion','$transporte','$internet','$luz',
								'$salud','$egresos_otros',$id_alumno)";
						$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						echo json_encode($rspta1);
				break;
				case 'guardarinfovivienda':
					/**Informacion Vivienda */
					$tenencia=$datos->tenencia;
					$especificacion_tenencia=$datos->especificacion_tenencia;
					$numero_pisos=$datos->numero_pisos; 
					$tipo_vivienda=$datos->tipo_vivienda;
					$material_vivienda=$datos->material_vivienda;
					$especificacion_vivienda=$datos->especificacion_vivienda;
					$techo_material=$datos->techo_material;
					$techo_especificacion=$datos->techo_especificacion;
					$puerta_material=$datos->puerta_material;
					$puerta_especificacion=$datos->puerta_especificacion;
					$ventana_material=$datos->ventana_material;
					$ventana_especificacion=$datos->ventana_especificacion;
					$piso_material=$datos->piso_material;
					$piso_especificacion=$datos->piso_especificacion;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO informacion_vivienda (tenencia, especificacion_tenencia, numero_pisos, tipo_vivienda, material_vivienda, especificacion_vivienda, techo_material, 
							techo_especificacion, puerta_material, puerta_especificacion, ventana_material, ventana_especificacion, piso_material, piso_especificacion,id_alumno)
							Values($tenencia,'$especificacion_tenencia',$numero_pisos,$tipo_vivienda,$material_vivienda,'$especificacion_vivienda',
							$techo_material,'$techo_especificacion',$puerta_material,'$puerta_especificacion',$ventana_material,'$ventana_especificacion',
							$piso_material,'$piso_especificacion',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Servicios */
					$servicios=$datos->servicios;
					$especificacion_servicio=$datos->especificacion_servicio;
					for ($i=0;$i<count($servicios) ;$i++)      
					{ 
						if($servicios[$i] > 0 && $servicios[$i] < 9){
							$consulta1="INSERT INTO servicios_vivienda ( servicio,id_alumno)
							Values($servicios[$i],$id_alumno)";
							$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($servicios[$i] == 9){
							$consulta1="INSERT INTO servicios_vivienda (servicio, especificacion_servicio,id_alumno)
							Values($servicios[$i],'$especificacion_servicio',$id_alumno)";
							$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Ambientes */
					$ambientes=$datos->ambientes;
					$especificacion_ambiente=$datos->especificacion_ambiente;
					for ($i=0;$i<count($ambientes) ;$i++)      
					{ 
						if($ambientes[$i] > 0 && $ambientes[$i] < 9){
							$consulta2="INSERT INTO ambientes_vivienda ( ambiente,id_alumno)
							Values($ambientes[$i],$id_alumno)";
							$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($ambientes[$i] == 9){
							$consulta2 ="INSERT INTO ambientes_vivienda (ambiente, especificacion_ambiente,id_alumno)
							Values($ambientes[$i],'$especificacion_ambiente',$id_alumno)";
							$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Muebles */
					$muebles=$datos->muebles;
					$especificacion_muebles=$datos->especificacion_muebles;
					for ($i=0;$i<count($muebles) ;$i++)      
					{ 
						if($muebles[$i] > 0 && $muebles[$i] < 5){
							$consulta3="INSERT INTO muebles_vivienda (mueble,id_alumno)
							Values($muebles[$i],$id_alumno)";
							$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($muebles[$i] == 5){
							$consulta3="INSERT INTO muebles_vivienda (mueble, especificacion_mueble,id_alumno)
							Values($muebles[$i],'$especificacion_muebles',$id_alumno)";
							$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Cocinas */
					$cocinas=$datos->cocinas;
					for ($i=0;$i<count($cocinas) ;$i++)      
					{ 
						if($cocinas[$i] > 0 ){
							$consulta4="INSERT INTO cocina_vivienda ( cocina,id_alumno)
							Values($cocinas[$i],$id_alumno)";
							$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Artefactos */
					$artefactos=$datos->artefactos;
					$especificacion_artefactos=$datos->especificacion_artefactos;
					for ($i=0;$i<count($artefactos) ;$i++)      
					{ 
						if($artefactos[$i] > 0 && $artefactos[$i] < 16){
							$consulta5="INSERT INTO artefacto_vienda( artefacto,id_alumno)
							Values($artefactos[$i],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($artefactos[$i] == 16){
							$consulta5="INSERT INTO artefacto_vienda (artefacto, especificacion_artefacto,id_alumno)
							Values($artefactos[$i],'$especificacion_artefactos',$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					echo json_encode($rspta);
				break;
				case 'guardarinfosalud':
					/**Informacion Salud */
					$lugar_alimento=$datos->lugar_alimento;
					$especificacion_alimento=$datos->especificacion_alimento;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO informacion_salud (lugar_alimentos, especificacion_alimento,id_alumno)
							Values($lugar_alimento,'$especificacion_alimento',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Enfermedad_alumno */
					$enfermedades=$datos->enfermedades;
					$especificacion_alergia=$datos->especificacion_alergia;
					$especificacion_enfermedad=$datos->especificacion_enfermedad;
					for ($i=0;$i<count($enfermedades) ;$i++)      
					{ 
						if(($enfermedades[$i] > 0 && $enfermedades[$i] < 8) || ($enfermedades[$i] > 8 && $enfermedades[$i] < 14)){
							$consulta1="INSERT INTO enfermedad_alumno (enfermedad,id_alumno)
							Values($enfermedades[$i],$id_alumno)";
							$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($enfermedades[$i] == 8){
							$consulta1="INSERT INTO enfermedad_alumno (enfermedad,  especificacion_alergia,id_alumno)
							Values($enfermedades[$i],'$especificacion_alergia',$id_alumno)";
							$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
						}
						else if($enfermedades[$i] == 14){
							$consulta1="INSERT INTO enfermedad_alumno (enfermedad, especificacion_enfermedad,id_alumno)
							Values($enfermedades[$i],'$especificacion_enfermedad',$id_alumno)";
							$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Discapacidad */
					$discapacidad=$datos->discapacidad;
					$especificacion_discapacidad=$datos->especificacion_discapacidad;
					for ($i=0;$i<count($discapacidad) ;$i++)      
					{ 
						if(($discapacidad[$i] > 0 && $discapacidad[$i] < 5) || $discapacidad[$i] > 5){
							$consulta2="INSERT INTO discapacidad_alumno (discapacidad,id_alumno)
							Values($discapacidad[$i],$id_alumno)";
							$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($discapacidad[$i] == 5){
							$consulta2="INSERT INTO discapacidad_alumno (discapacidad, especificacion_discapacidad,id_alumno)
							Values($discapacidad[$i],'$especificacion_discapacidad',$id_alumno)";
							$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
					}
					/**Enfermedadades familiares*/
					$arrayEnfermedadPariente=$datos->arrayEnfermedadPariente;
					for ($i=0;$i<count($arrayEnfermedadPariente) ;$i++)      
					{ 
						
						$consulta3="INSERT INTO enfermedades_familia (parentesco, enfermedad, centro_medico,id_alumno)
						Values('".$arrayEnfermedadPariente[$i]->parentesco."','".$arrayEnfermedadPariente[$i]->enfermedad."','".$arrayEnfermedadPariente[$i]->centro_medico."',$id_alumno)";
						$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
						
					}
					echo json_encode($rspta);
				break;
				case 'guardarinforecreacion':
						/**Informacion Recreacion */
						$lugar_estudio=0; 
						$donde=$datos->donde; 
						$porque=$datos->porque; 
						$id_alumno= $datos->id_alumno;
						$consulta="INSERT INTO informacion_recreacion_cultura (lugar_estudio, donde_fuera, porque_fuera,id_alumno)
							Values($lugar_estudio,'$donde','$porque',$id_alumno)";
						$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
						/**lugares_distraccion */
						$lugares_distraccion=$datos->lugares_distraccion; 
						$especificacion_distraccion=$datos->especificacion_distraccion;
						for ($i=0;$i<count($lugares_distraccion) ;$i++)      
						{ 
							if($lugares_distraccion[$i] > 0 && $lugares_distraccion[$i] < 9 ){
								$consulta1="INSERT INTO lugares_distraccion (distraccion, id_alumno)
								Values($lugares_distraccion[$i],$id_alumno)";
								$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($lugares_distraccion[$i] == 9){
								$consulta1="INSERT INTO lugares_distraccion (distraccion, especificacion_distraccion,id_alumno)
								Values($lugares_distraccion[$i],'$especificacion_distraccion',$id_alumno)";
								$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**actividades_culturales */ 
						$actividades_culturales=$datos->actividades_culturales; 
						$especificacion_actividad=$datos->especificacion_actividad;
						for ($i=0;$i<count($actividades_culturales) ;$i++)      
						{ 
							if($actividades_culturales[$i] > 0 && $actividades_culturales[$i] < 14 ){
								$consulta2="INSERT INTO actividades_culturales (actividad_cultural,id_alumno)
								Values($actividades_culturales[$i],$id_alumno)";
								$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($actividades_culturales[$i] == 14){
								$consulta2="INSERT INTO actividades_culturales (actividad_cultural, especificacion_actividad,id_alumno)
								Values($actividades_culturales[$i],'$especificacion_actividad',$id_alumno)";
								$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**charlas_educativas */ 
						$charlas_educativas=$datos->charlas_educativas; 
						$especificacion_charla=$datos->especificacion_charla;
						for ($i=0;$i<count($charlas_educativas) ;$i++)      
						{ 
							if($charlas_educativas[$i] > 0 && $charlas_educativas[$i] < 4 ){
								$consulta3="INSERT INTO charlas_educativas (charla_educativa,id_alumno)
								Values($charlas_educativas[$i],$id_alumno)";
								$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($charlas_educativas[$i] == 4){
								$consulta3="INSERT INTO charlas_educativas (charla_educativa, especificacion_charla,id_alumno)
								Values($charlas_educativas[$i],'$especificacion_charla',$id_alumno)";
								$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**talleres_productivos*/ 
						$talleres_productivos=$datos->talleres_productivos;
						$especificacion_productivo=$datos->especificacion_productivo;
						for ($i=0;$i<count($talleres_productivos) ;$i++)      
						{ 
							if($talleres_productivos[$i] > 0 && $talleres_productivos[$i] < 4 ){
								$consulta4="INSERT INTO talleres_productivos (taller_productivo,id_alumno)
								Values($talleres_productivos[$i],$id_alumno)";
								$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($talleres_productivos[$i] == 4){
								$consulta4="INSERT INTO talleres_productivos (taller_productivo, especificacion_productivo,id_alumno)
								Values($talleres_productivos[$i],'$especificacion_productivo',$id_alumno)";
								$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**talleres_culturales */  
						$talleres_culturales=$datos->talleres_culturales; 
						$especificacion_cultural=$datos->especificacion_cultural; 
						for ($i=0;$i<count($talleres_culturales) ;$i++)      
						{ 
							if($talleres_culturales[$i] > 0 && $talleres_culturales[$i] < 6 ){
								$consulta5="INSERT INTO talleres_culturales (taller_cultural,id_alumno)
								Values($talleres_culturales[$i],$id_alumno)";
								$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($talleres_culturales[$i] == 6){
								$consulta5="INSERT INTO talleres_culturales (taller_cultural, especificacion_cultural,id_alumno)
								Values($talleres_culturales[$i],'$especificacion_cultural',$id_alumno)";
								$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**habilidades_culturales */ 
						$culturales=$datos->culturales; 
						$especificacion_culturales=$datos->especificacion_culturales;
						for ($i=0;$i<count($culturales) ;$i++)      
						{ 
							if($culturales[$i] > 0 && $culturales[$i] < 6 ){
								$consulta6="INSERT INTO habilidades_culturales (habilidad_cultural,id_alumno)
								Values($culturales[$i],$id_alumno)";
								$rspta6=mysqli_query( $conexion, $consulta6 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($culturales[$i] == 6){
								$consulta6="INSERT INTO habilidades_culturales (habilidad_cultural, especificacion_culturales,id_alumno)
								Values($culturales[$i],'$especificacion_culturales',$id_alumno)";
								$rspta6=mysqli_query( $conexion, $consulta6 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**habilidades_manuales */  
						$manuales=$datos->manuales; 
						$especificacion_manuales=$datos->especificacion_manuales;
						for ($i=0;$i<count($manuales) ;$i++)      
						{ 
							if($manuales[$i] > 0 && $manuales[$i] < 6 ){
								$consulta7="INSERT INTO habilidades_manuales (habilidad_manual,id_alumno)
								Values($manuales[$i],$id_alumno)";
								$rspta7=mysqli_query( $conexion, $consulta7 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($manuales[$i] == 6){
								$consulta7="INSERT INTO habilidades_manuales (habilidad_manual, especificacion_manuales,id_alumno)
								Values($manuales[$i],'$especificacion_manuales',$id_alumno)";
								$rspta7=mysqli_query( $conexion, $consulta7 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						}
						/**habilidades_deportivas */ 
						$deportivas=$datos->deportivas; 
						$especificacion_deportivas=$datos->especificacion_deportivas;    
						for ($i=0;$i<count($deportivas) ;$i++)      
						{ 
							if($deportivas[$i] > 0 && $deportivas[$i] < 8 ){
								$consulta8="INSERT INTO habilidades_deportivas (habilidad_deportiva,id_alumno)
								Values($deportivas[$i],$id_alumno)";
								$rspta8=mysqli_query( $conexion, $consulta8 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
							}
							else if($deportivas[$i] == 8){
								$consulta8="INSERT INTO habilidades_deportivas (habilidad_deportiva, especificacion_deportivas,id_alumno)
								Values($deportivas[$i],'$especificacion_deportivas',$id_alumno)";
								$rspta8=mysqli_query( $conexion, $consulta8 ) or die ( "Algo ha ido mal en la consulta a la base de datos1");
							}
						} 	  
						echo json_encode($rspta);
				break;
				case 'guardaridb':
					/**Test Personalidad */
					$pa_1=$datos->pa_1;$pa_2=$datos->pa_2;$pa_3=$datos->pa_3;$pa_4=$datos->pa_4;$pa_5=$datos->pa_5;
					$pa_6=$datos->pa_6;$pa_7=$datos->pa_7;$pa_8=$datos->pa_8;$pa_9=$datos->pa_9;$pa_10=$datos->pa_10;
					$pa_11=$datos->pa_11;$pa_12=$datos->pa_12;$pa_13=$datos->pa_13;$pa_14=$datos->pa_14;$pa_15=$datos->pa_15;
					$pa_16=$datos->pa_16;$pa_17=$datos->pa_17;$pa_18=$datos->pa_18;$pa_19=$datos->pa_19;$pa_20=$datos->pa_20;
					$pa_21=$datos->pa_21;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO evalucion_idb(pregunta_1, pregunta_2, pregunta_3, pregunta_4, pregunta_5, pregunta_6, 
					pregunta_7, pregunta_8, pregunta_9, pregunta_10, pregunta_11, pregunta_12, pregunta_13, pregunta_14, 
					pregunta_15, pregunta_16, pregunta_17, pregunta_18, pregunta_19, pregunta_20, pregunta_21,
					id_alumno)
					Values($pa_1,$pa_2,$pa_3,$pa_4,$pa_5,$pa_6,$pa_7,$pa_8,$pa_9,$pa_10,$pa_11,$pa_12,$pa_13,$pa_14,$pa_15,
					'$pa_16',$pa_17,'$pa_18',$pa_19,$pa_20,$pa_21,$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
				case 'guardarsqr':
					/**Test Social */
					$pb_1=$datos->pb_1;$pb_2=$datos->pb_2;$pb_3=$datos->pb_3;$pb_4=$datos->pb_4;$pb_5=$datos->pb_5;
					$pb_6=$datos->pb_6;$pb_7=$datos->pb_7;$pb_8=$datos->pb_8;$pb_9=$datos->pb_9;$pb_10=$datos->pb_10;
					$pb_11=$datos->pb_11;$pb_12=$datos->pb_12;$pb_13=$datos->pb_13;$pb_14=$datos->pb_14;$pb_15=$datos->pb_15;
					$pb_16=$datos->pb_16;$pb_17=$datos->pb_17;$pb_18=$datos->pb_18;$pb_19=$datos->pb_19;$pb_20=$datos->pb_20;
					$pb_21=$datos->pb_21;$pb_22=$datos->pb_22;$pb_23=$datos->pb_23;$pb_24=$datos->pb_24;$pb_25=$datos->pb_25;
					$pb_26=$datos->pb_26;$pb_27=$datos->pb_27;$pb_28=$datos->pb_28;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO evaluacion_srq (pregunta_1, pregunta_2, pregunta_3, pregunta_4, pregunta_5, pregunta_6, 
					pregunta_7, pregunta_8, pregunta_9, pregunta_10, pregunta_11, pregunta_12, pregunta_13, pregunta_14, 
					pregunta_15, pregunta_16, pregunta_17, pregunta_18, pregunta_19, pregunta_20, pregunta_21, pregunta_22, 
					pregunta_23, pregunta_24, pregunta_25, pregunta_26, pregunta_27, pregunta_28,id_alumno)
					Values($pb_1,$pb_2,$pb_3,$pb_4,$pb_5,$pb_6,$pb_7,$pb_8,$pb_9,$pb_10,$pb_11,$pb_12,$pb_13,$pb_14,$pb_15,
					$pb_16,$pb_17,$pb_18,$pb_19,$pb_20,$pb_21,$pb_22,$pb_23,$pb_24,$pb_25,$pb_26,$pb_27,
					$pb_28,$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
				case 'countidb': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM evalucion_idb
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countsqr': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM evaluacion_srq
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'fechanacimiento': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT fecha_nacimiento,sexo 
							   FROM informacion_personal
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countnutricion': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM evaluacion_nutricional
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'countmedico': 
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT count(id_alumno) as cantidad 
							   FROM evaluacion_medica
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'guardarmedica':
					/**evaluacion_medica */
					$presion_arterial= $datos->presion_arterial;
					$pulso= $datos->pulso;
					$respiracion= $datos->respiracion;
					$temperatura= $datos->temperatura;
					$presintoma = $datos->presintoma;
					$enfermedad= $datos->enfermedad;
					$medicamento= $datos->medicamento;
					$discapacidad= $datos->discapacidad;
					$covid= $datos->covid;
					$diagnostico= $datos->diagnostico;
					$fallecido= $datos->fallecido;
					$servicio = $datos->servicio;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO evaluacion_medica (presion_arterial,pulso,respiracion,temperatura,presintoma,enfermedad,diagnostico,alergia_medicamento,discapacidad,respuesta_covid,familiar_fallecidos,servicio,id_alumno)
						Values('$presion_arterial','$pulso','$respiracion','$temperatura','$presintoma','$enfermedad','$diagnostico','$medicamento','$discapacidad','$covid','$fallecido','$servicio',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos1".$consulta);
					/**MEDICAMENTOS*/
					if($medicamento==1){
						$alergias= $datos->alergias;
						$especificacion_medicamento= $datos->especificacion_medicamento;
						for ($i=0;$i<count($alergias) ;$i++)      
						{ 		if($alergias[$i] < 11 ){			
									$consulta1="INSERT INTO alergias_medicamentos ( medicamento,id_alumno)
									Values($alergias[$i],$id_alumno)";
									$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
								}else if ($alergias[$i]==11){
									$consulta1="INSERT INTO alergias_medicamentos ( medicamento, especificacion_medicamento,id_alumno)
									Values($alergias[$i],'$especificacion_medicamento',$id_alumno)";
									$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
								}
						}
					}
					/**Sintomas*/
					if($covid==1){
						$sintomas= $datos->sintomas;
						for ($i=0;$i<count($sintomas) ;$i++)      
						{ 		
								$consulta2="INSERT INTO sintomas_covid ( sintoma,id_alumno)
								Values($sintomas[$i],$id_alumno)";
								$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						
						}
					}
					/**Secuelas*/
					if($covid==1){
						$secuelas=$datos->secuelas;
                        $especificacion_secuela=$datos->especificacion_secuela;
						for ($i=0;$i<count($secuelas) ;$i++)      
						{ 		if($secuelas[$i] < 12 ){
									$consulta3="INSERT INTO secuelas_codiv ( secuela,id_alumno)
									Values($secuelas[$i],$id_alumno)";
									$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
								}else if($secuelas[$i] == 12){
									$consulta3="INSERT INTO secuelas_codiv ( secuela, especificacion_secuela,id_alumno)
									Values($secuelas[$i],'$especificacion_secuela',$id_alumno)";
									$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
								}
								
						
						}
					}
					/**Familiares Fallecidos*/
					if($fallecido==1){
						$familiares= $datos->familiares;
						for ($i=0;$i<count($familiares) ;$i++)      
						{ 		
								$consulta4="INSERT INTO familiares_fallecidos ( familiar,id_alumno)
								Values($familiares[$i],$id_alumno)";
								$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						
						}
					}
					echo json_encode($rspta);
				break;
				case 'enfermedad_alumno':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT *
								FROM enfermedad_alumno where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'imc':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT indice_masa,peso,talla
								FROM evaluacion_nutricional where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'informacionSalud':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT m.presion_arterial,m.pulso,m.respiracion,m.enfermedad FROM evaluacion_medica m
								where m.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'enfermedad_alumno':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT e.enfermedad,e.especificacion_enfermedad,e.especificacion_alergia FROM enfermedad_alumno e
								where e.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'alumnos':
					/** paginancion */
					$page_number =$datos->page_number-1;
					$count_per_page = 25;
					$next_offset = $page_number * $count_per_page;

					/** Filtros */
					$filtro = $datos->filtro;
					$dato = $datos->dato;
					$facultad = $datos->facultad;
					$escuela = $datos->escuela;

					$consulta="SELECT a.id_alumno,a.nombres,a.apellidopaterno,a.apellidomaterno,a.dni,a.escuela,a.facultad,a.ingreso
								FROM alumnos a 
								where a.$filtro like '%$dato%' and a.facultad like '%$facultad%' and a.escuela like '%$escuela%'
								order by a.apellidopaterno,a.apellidomaterno ASC LIMIT $count_per_page OFFSET $next_offset";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'totalAlumnos': 
					/** Filtros */
					$filtro = $datos->filtro;
					$dato = $datos->dato;
					$facultad = $datos->facultad;
					$escuela = $datos->escuela;

					$consulta="SELECT count(a.id_alumno) as cantidad 
							   	FROM alumnos a 
								where a.$filtro like '%$dato%' and a.facultad like '%$facultad%' and a.escuela like '%$escuela%'";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'escuelas': 
					$facultad =$datos->facultad;
					$consulta="SELECT DISTINCT a.escuela FROM alumnos a where a.facultad like '%$facultad%' ORDER BY a.escuela ASC";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'informacionPersonal':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT p.foto,p.sexo as genero,p.estado_civil as id_civil,e.estado_civil ,p.fecha_nacimiento,p.codigo_universitario,p.direccion,p.distrito_direccion,p.celular,p.telefono,p.correo,
								region_nacimiento,provincia_nacimiento,distrito_nacimiento,referencia,lugar,region_procedencia,provincia_procedencia,distrito_procedencia,
								(SELECT u.nombre_ubigeo FROM ubigeo u where u.cod_region=p.region_nacimiento and u.cod_provincia=0 and u.cod_distrito=0) AS region,
								(SELECT u.nombre_ubigeo FROM ubigeo u where u.cod_region=p.region_nacimiento and u.cod_provincia=p.provincia_nacimiento and u.cod_distrito=0) AS provincia,
								(SELECT u.nombre_ubigeo FROM ubigeo u where u.cod_region=p.region_nacimiento and u.cod_provincia=p.provincia_nacimiento and u.cod_distrito=p.distrito_nacimiento) AS distrito
								FROM informacion_personal p 
								INNER join estado_civil e on p.estado_civil=e.id_civil
								where p.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'informacionEducacional':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT fecha_secundaria, tipo_colegio, especificacion_colegio, modalidad, tipo_preparacion, especificacion_preparacion, otros_estudios, otra_universidad, especificacion_universidad, trabajo, dependencia_economica, pension
								FROM informacion_educacional e 
								where e.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'otrosIdiomas':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT idioma, especifique,nivel
								FROM otros_idiomas i
								where i.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'aspectos_universidad':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT aspecto
								FROM aspectos_universidad a
								where a.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'otros_estudios':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT tipo_estudio, estudio, especificacion_estudio, nivel
								FROM otros_estudios o
								where o.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'trabajos':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT sueldo, centro_trabajo, cargo, condicion
								FROM trabajos t
								where t.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'pensiones':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT monto, frecuencia
								FROM pensiones p
								where p.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'informacionFamiliar':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT residencia_padre, direccion_padre, telefono_padre, residencia_madre, direccion_madre, telefono_madre FROM informacion_familiar f 
								where f.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'familiares':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT familiar, fecha_nacimiento as parienteEdad, parentesco, estado_civil as pariente_civil , grado_instruccion, ocupacion, centro_laboral, ingresos as ingreso
								FROM composicion_familiar cp
								where cp.id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'Exportalumnos':
					/** Filtros */
					$filtro = $datos->filtro;
					$dato = $datos->dato;
					$facultad = $datos->facultad;
					$escuela = $datos->escuela;

					$consulta="SELECT a.nombres,a.apellidopaterno,a.apellidomaterno,a.dni,a.escuela,a.facultad,a.ingreso
								FROM alumnos a 
								where a.$filtro like '%$dato%' and a.facultad like '%$facultad%' and a.escuela like '%$escuela%'
								order by a.apellidopaterno,a.apellidomaterno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'selectAlumno': 
					$dato = $datos->dato;
					$consulta="SELECT a.id_alumno,a.apellidoPaterno ,a.apellidoMaterno,a.nombres,a.dni FROM alumnos a where ( a.dni like '%$dato%')  order by a.id_alumno asc";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'alumno':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT nombres,apellidopaterno,apellidomaterno,dni,escuela,facultad,ingreso,usuario,clave,modificar
								FROM alumnos where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'alumnos_social':
					/** paginancion */
					$page_number =$datos->page_number-1;
					$count_per_page = 10;
					$next_offset = $page_number * $count_per_page;

					/** Filtros */
					$filtro = $datos->filtro;
					$dato = $datos->dato;
					$facultad = $datos->facultad;
					$escuela = $datos->escuela;

					$consulta="SELECT a.id_alumno,a.nombres,a.apellidopaterno,a.apellidomaterno,a.dni,a.escuela,a.facultad,a.ingreso,count(e.id_alumno) as cant_nutricion ,count(s.id_alumno) as cant_medico
								FROM alumnos a 
								inner join informacion_personal f on a.id_alumno=f.id_alumno
								LEFT join evaluacion_nutricional e on a.id_alumno=e.id_alumno
								LEFT join evaluacion_medica s on a.id_alumno=s.id_alumno
								where a.$filtro like '%$dato%' and a.facultad like '%$facultad%' and a.escuela like '%$escuela%'
								group by a.id_alumno,a.nombres,a.apellidopaterno,a.apellidomaterno
								order by a.ingreso desc LIMIT $count_per_page OFFSET $next_offset";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'totalAlumnos_social': 
					/** Filtros */
					$filtro = $datos->filtro;
					$dato = $datos->dato;
					$facultad = $datos->facultad;
					$escuela = $datos->escuela;

					$consulta="SELECT count(a.id_alumno) as cantidad 
							   	FROM alumnos a 
								inner join informacion_personal f on a.id_alumno=f.id_alumno
								where a.$filtro like '%$dato%' and a.facultad like '%$facultad%' and a.escuela like '%$escuela%'";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'guardarnutricion':
					/**evaluacion_nutricional */
					$peso= $datos->peso;
					$talla= $datos->talla;
					$indice_masa= $datos->indice_masa;
					$actividad_fisica= $datos->actividad_fisica;
					$alergias= $datos->alergias; 
					$fecha= $datos->fecha; 
					$diagnostico = $datos->diagnostico;
					$servicio = $datos->servicio;
					$id_alumno= $datos->id_alumno;
					$consulta="INSERT INTO evaluacion_nutricional (peso, talla,indice_masa,diagnostico, actividad_fisica, alergias,servicio,fecha,id_alumno)
						Values('$peso','$talla','$indice_masa','$diagnostico',$actividad_fisica,'$alergias','$servicio','$fecha',$id_alumno)";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
				case 'discapacidad':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT discapacidad, especificacion_discapacidad FROM discapacidad_alumno where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'historial_nutricion':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT peso,talla,indice_masa,diagnostico,fecha FROM evaluacion_nutricional where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				case 'historial_medico':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT presion_arterial, pulso, respiracion, temperatura,diagnostico,registrar FROM evaluacion_medica where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					while ($row=mysqli_fetch_assoc($rspta)){
						$response[] = $row;
					}
					echo json_encode($response);
				break;
				/**Nuevos */
				case 'indiceEaa': 
					$id_alumno=$datos->id_alumno;
					$resultado=0;
					$indice='';
					$consulta="SELECT sum(pregunta_1+pregunta_2+pregunta_3+pregunta_4+pregunta_5+pregunta_6+pregunta_7+pregunta_8+pregunta_9+pregunta_10+pregunta_11+pregunta_12+pregunta_13+pregunta_14+pregunta_15+pregunta_16+pregunta_17+pregunta_18+pregunta_19+pregunta_20) as resultado
							   FROM indice_eaa
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					$data=mysqli_fetch_assoc($rspta);
					if($data){
						$valor=($data['resultado']/80)*100;
						if($valor>=1 && $valor<=45){
							$indice='DENTRO DE LOS LIMITES NORMALES';
						}else if($valor>=46 && $valor<=68){
							$indice='PRESENCIA MINIMA DE ANSIEDAD LEVE A MODERADA';
						}else if($valor>=69 && $valor<=74){	
							$indice='PRESENCIA DE ANSIEDAD MODERADA A SEVERA';
						}else if($valor>=75 && $valor<=100){
							$indice='PRESENCIA DE ANSIEDAD EN GRADO MAXIMO';
						}else{
							$indice='NO SE REALIZO LA EVALUACION';
						}

					}
					echo json_encode($indice);
				break;
				case 'indiceEamd': 
					$id_alumno=$datos->id_alumno;
					$resultado=0;
					$indice='';
					$consulta="SELECT sum(pregunta_1+pregunta_2+pregunta_3+pregunta_4+pregunta_5+pregunta_6+pregunta_7+pregunta_8+pregunta_9+pregunta_10+pregunta_11+pregunta_12+pregunta_13+pregunta_14+pregunta_15+pregunta_16+pregunta_17+pregunta_18+pregunta_19+pregunta_20) as resultado
							   FROM indice_eamd
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					$data=mysqli_fetch_assoc($rspta);
					if($data){
						$valor=($data['resultado']/80)*100;
						if($valor>=1 && $valor<=45){
							$indice='DENTRO DE LOS LIMITES NORMALES';
						}else if($valor>=46 && $valor<=68){	
							$indice='PRESENCIA MINIMA DE DEPRESION LEVE A MODERADA';
						}else if($valor>=69 && $valor<=74){
							$indice='PRESENCIA DE DEPRESION MARCADA A SEVERA';
						}else if($valor>=75 && $valor<=100){
							$indice='PRESENCIA DE DEPRESION EN GRADO MAXIMO';
						}else{
							$indice='NO SE REALIZO LA EVALUACION';
						}
					}
					echo json_encode($indice);
				break;
				case 'habilidadSocial':
					$id_alumno=$datos->id_alumno;
					$consulta="SELECT sum(pregunta_1+pregunta_2+pregunta_3+pregunta_4+pregunta_5+pregunta_6+pregunta_7+pregunta_8+pregunta_9+pregunta_10+pregunta_11+pregunta_12+pregunta_13+pregunta_14+pregunta_15+pregunta_16+pregunta_17+pregunta_18+pregunta_19+pregunta_20) as resultado
							   FROM habilidad_social
							   where id_alumno= $id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					$data=mysqli_fetch_assoc($rspta);
					
				break;
				

			}
		break;
		case 'PUT':
			switch ($ruta) {
				case 'modificarUser':
					$usuario=$datos->usuario;
					$clave=$datos->clave;
					$id_alumno= $datos->id_alumno;
					//Aquí podríamos acceder a otras propiedades
					$consulta="UPDATE alumnos SET usuario = '$usuario' , clave='$clave' where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
				case 'modificarinfopersonal':
					$foto = $datos->foto;
					$sexo = $datos->sexo;
					$fecha_nacimiento= $datos->fecha_nacimiento;
					$codigo_universitario= $datos->codigo_universitario;
					$region_nacimiento= $datos->region_nacimiento;
					$provincia_nacimiento= $datos->provincia_nacimiento;
					$distrito_nacimiento= $datos->distrito_nacimiento;
					$estado_civil= $datos->estado_civil;
					$direccion= $datos->direccion;
					$distrito_direccion= $datos->distrito_direccion;
					$referencia= $datos->referencia;
					$telefono= $datos->telefono;
					$celular= $datos->celular;
					$correo= $datos->correo;
					$lugar= $datos->lugar;
					$region_procedencia= $datos->region_procedencia;
					$provincia_procedencia= $datos->provincia_procedencia;
					$distrito_procedencia= $datos->distrito_procedencia;
					$id_alumno= $datos->id_alumno;
					//Aquí podríamos acceder a otras propiedades
					$consulta="UPDATE informacion_personal SET foto = '$foto',sexo = $sexo,fecha_nacimiento='$fecha_nacimiento',codigo_universitario ='$codigo_universitario',region_nacimiento='$region_nacimiento', 
					provincia_nacimiento='$provincia_nacimiento',distrito_nacimiento='$distrito_nacimiento',estado_civil=$estado_civil,direccion='$direccion',distrito_direccion='$distrito_direccion',referencia ='$referencia', 
					telefono='$telefono',celular='$celular',correo='$correo',lugar='$lugar',region_procedencia='$region_procedencia',provincia_procedencia='$provincia_procedencia',distrito_procedencia='$distrito_procedencia' where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
				case 'modificarinfoeducacional':
					$fecha_secundaria= $datos->fecha_secundaria;
					$colegio= $datos->colegio;
					$especificacion_colegio= $datos->especificacion_colegio;
					$modalidad= $datos->modalidad;
					$preparacion= $datos->preparacion;
					$especificacion_preparacion= $datos->especificacion_preparacion;
					$otros_estudios= $datos->otros_estudios;
					$otra_universidad= $datos->otra_universidad;
					$especificacion_universidad= $datos->especificacion_universidad;
					$trabajo= $datos->trabajo;
					$dependencia_economica= $datos->dependencia_economica;
					$pension= $datos->pension;
					$id_alumno= $datos->id_alumno;
					//Aquí podríamos acceder a otras propiedades
					$consulta="UPDATE informacion_educacional SET fecha_secundaria='$fecha_secundaria',tipo_colegio=$colegio,especificacion_colegio='$especificacion_colegio',modalidad=$modalidad,tipo_preparacion=$preparacion,especificacion_preparacion='$especificacion_preparacion',otros_estudios=$otros_estudios,otra_universidad=$otra_universidad,especificacion_universidad='$especificacion_universidad',trabajo=$trabajo,dependencia_economica=$dependencia_economica,pension=$pension where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					/**Aspectos_universitarios*/
					$aspectos= $datos->aspectos;
					$eliminar1="DELETE FROM aspectos_universidad WHERE id_alumno=$id_alumno";
					mysqli_query( $conexion, $eliminar1 ) or die ( "Algo ha ido mal en la eliminacion de datos");
					for ($i=0;$i<count($aspectos) ;$i++)      
					{ 

						$consulta1="INSERT INTO aspectos_universidad (id_alumno,aspecto)
						Values($id_alumno,$aspectos[$i])";
						$rspta1=mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						

					}
					/** Otros_estudios*/
					$tipo_estudio=$datos->tipo_estudio;
					$estudio=$datos->estudio;
					$especificacion_estudio=$datos->especificacion_estudio;
					$nivel_estudio=$datos->nivel_estudio;
					$eliminar2="DELETE FROM otros_estudios WHERE id_alumno=$id_alumno";
					mysqli_query( $conexion, $eliminar2 ) or die ( "Algo ha ido mal en la eliminacion de datos");
					if($otros_estudios==1){
						$consulta2="INSERT INTO otros_estudios (tipo_estudio, estudio, especificacion_estudio, nivel, id_alumno)
									Values($tipo_estudio,$estudio,'$especificacion_estudio',$nivel_estudio,$id_alumno)";
						$rspta2=mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Trabajos */
					$sueldo=$datos->sueldo;
					$centro_trabajo=$datos->centro_trabajo;
					$cargo=$datos->cargo;
					$condicion=$datos->condicion;
					$eliminar3="DELETE FROM trabajos WHERE id_alumno=$id_alumno";
					mysqli_query( $conexion, $eliminar3 ) or die ( "Algo ha ido mal en la eliminacion de datos");
					if($trabajo==1){
						$consulta3="INSERT INTO trabajos (sueldo, centro_trabajo, cargo, condicion, id_alumno)
									Values('$sueldo','$centro_trabajo','$cargo',$condicion,$id_alumno)";
						$rspta3=mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Pension */
					$monto=$datos->monto;
					$frecuencia=$datos->frecuencia;
					$eliminar4="DELETE FROM pensiones WHERE id_alumno=$id_alumno";
					mysqli_query( $conexion, $eliminar4 ) or die ( "Algo ha ido mal en la eliminacion de datos");
					if($pension==1){
						$consulta4="INSERT INTO pensiones(monto, frecuencia, id_alumno)
									Values('$monto','$frecuencia',$id_alumno)";
						$rspta4=mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					}
					/**Idiomas */
					$arrayidiomas=$datos->arrayidiomas;
					$especificacion_idioma=$datos->especificacion_idioma;
					$nivel_idioma=$datos->nivel_idioma;
					$eliminar5="DELETE FROM otros_idiomas WHERE id_alumno=$id_alumno";
					mysqli_query( $conexion, $eliminar5 ) or die ( "Algo ha ido mal en la eliminacion de datos");
					for ($i=0;$i<count($arrayidiomas) ;$i++)      
					{ 
						if($arrayidiomas[$i] == 1){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[0],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 2){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[1],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 3){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[2],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 4){
							$consulta5="INSERT INTO otros_idiomas (idioma,nivel,id_alumno)
							Values($arrayidiomas[$i],$nivel_idioma[3],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}
						else if($arrayidiomas[$i] == 5){
							$consulta5="INSERT INTO otros_idiomas (idioma,especifique,nivel,id_alumno)
							Values($arrayidiomas[$i],'$especificacion_idioma',$nivel_idioma[4],$id_alumno)";
							$rspta5=mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
						}

					} 
					echo json_encode($rspta);
				break;
				/**nuevos */
				case 'validarDatos':
					$id_alumno= $datos->id_alumno;
					//Aquí podríamos acceder a otras propiedades
					$consulta="UPDATE alumnos SET validar = 1  where id_alumno=$id_alumno";
					$rspta=mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
					echo json_encode($rspta);
				break;
			}
		break;
		case 'DELETE':
			switch ($ruta) {
				case 'usuario':
					echo json_encode("Eliminar un usuario");
					break;
				case 'venta':
					echo json_encode("Eliminar una venta");
					break;
			}
		break;
	}
?>