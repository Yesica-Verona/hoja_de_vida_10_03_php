<?php
// Datos de conexión a la base de datos
$host = 'localhost:3309';
$usuario = 'root';
$contrasena = '';
$basedatos = 'hv_1003';

//Conexión creada
$conexion = new mysqli($host, $usuario, $contrasena, $basedatos);

// Conexión verificada 
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->begin_transaction();

try {
    // Validar radios
    $doc_identificacion = isset($_POST['doc_identificacion']) ? $_POST['doc_identificacion'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
    $libreta_militar = isset($_POST['libreta_militar']) ? $_POST['libreta_militar'] : '';
    $primaria = isset($_POST['primaria']) ? $_POST['primaria'] : '';
    $secundaria = isset($_POST['secundaria']) ? $_POST['secundaria'] : '';
    $media = isset($_POST['media']) ? $_POST['media'] : '';
    $causales = isset($_POST['causales']) ? $_POST['causales'] : '';


   // tabla datos_personales
    $entidad_receptora = $_POST ['entidad_receptora'];
    $primer_apellido = $_POST ['primer_apellido'];
    $segundo_apellido = $_POST ['segundo_apellido'];
    $nombres = $_POST ['nombres'];
    $num_identificacion = $_POST['num_identificacion'];
    $pais_nacionalidad = $_POST ['pais_nacionalidad'];
    $num_libreta  = $_POST['num_libreta'];
    $distrito  = $_POST['distrito'];
    $fecha_nacimiento = $_POST ['fecha_nacimiento'];
    $pais_nacimiento  = $_POST['pais_nacimiento'];
    $depto_nacimiento  = $_POST['depto_nacimiento'];
    $muni_nacimiento  = $_POST['muni_nacimiento'];
    $correspondencia  = $_POST['correspondencia'];
    $pais_correspondencia  = $_POST['pais_correspondencia'];
    $depto_correspondencia = $_POST ['depto_correspondencia'];
    $muni_correspondencia  = $_POST['muni_correspondencia'];
    $telefono  = $_POST['telefono'];
    $correo  = $_POST['correo'];
    //tabla educacion_basica
    $titulo_obtenido  = $_POST['titulo_obtenido'];
    $fecha_grado  = $_POST['fecha_grado'];
    //tabla educacion_superior
    $modalidad_academica  = $_POST['modalidad_academica'];
    $semestres_aprobados  = $_POST['semestres_aprobados'];
    $graduado = $_POST['graduado'];
    $estudios  = $_POST['estudios'];
    $fecha_terminacion  = $_POST['fecha_terminacion'];
    $tarjeta  = $_POST['tarjeta'];
    //tabla idiomas
    $idioma  = $_POST['idioma'];
    $habla  = $_POST['habla'];
    $lee  = $_POST['lee'];
    $escribe  = $_POST['escribe'];
    // tabla experiencia_laboral
    $empresa  = $_POST['empresa'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $pais_empresa  = $_POST['pais_empresa'];
    $depto_empresa  = $_POST['depto_empresa'];
    $muni_empresa  = $_POST['muni_empresa'];
    $email_empresa  = $_POST['email_empresa'];
    $telefono_empresa  = $_POST['telefono_empresa'];
    $fecha_ingreso  = $_POST['fecha_ingreso'];
    $fecha_retiro  = $_POST['fecha_retiro'];
    $cargo  = $_POST['cargo'];
    $dependencia  = $_POST['dependencia'];
    $direccion  = $_POST['direccion'];
    //tabla total_experiencia
    $meses_servidor  = $_POST['meses_servidor'];
    $años_servidor  = $_POST['años_servidor'];
    $meses_empleado  = $_POST['meses_empleado'];
    $años_empleado  = $_POST['años_empleado'];
    $meses_independiente  = $_POST['meses_independiente'];
    $años_independiente  = $_POST['años_independiente'];
    $meses_total_ex  = $_POST['meses_total_ex'];
    $años_total_ex  = $_POST['años_total_ex'];
    //tabla firmas_observaciones
    $ciudad_fecha_diligenciamiento = $_POST['ciudad_fecha_diligenciamiento'];
    $observaciones = $_POST['observaciones'];
    $ciudad_fecha_contrato = $_POST['ciudad_fecha_contrato'];
    $firma1 = $_POST['firma1'];
    $firma2 = $_POST['firma2'];


    // Insertar datos en la tabla datos_personales
    $guardar_datos_personales = $conexion->prepare("INSERT INTO datos_personales (entidad_receptora, primer_apellido, segundo_apellido, nombres, doc_identificacion, num_identificacion, genero,
                                  nacionalidad, pais_nacionalidad, libreta_militar, num_libreta, distrito, fecha_nacimiento, pais_nacimiento, depto_nacimiento,
                                  muni_nacimiento, correspondencia, pais_correspondencia, depto_correspondencia, muni_correspondencia, telefono, correo) 
                                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $guardar_datos_personales->bind_param("ssssssssssssssssssssss", $entidad_receptora, $primer_apellido, $segundo_apellido, $nombres, $doc_identificacion, $num_identificacion, $genero,
                       $nacionalidad, $pais_nacionalidad, $libreta_militar, $num_libreta, $distrito, $fecha_nacimiento, $pais_nacimiento, $depto_nacimiento,
                       $muni_nacimiento, $correspondencia, $pais_correspondencia, $depto_correspondencia, $muni_correspondencia, $telefono, $correo);
    $guardar_datos_personales->execute();
    $id_usuario = $conexion->insert_id;

    // Insertar datos en la tabla educacion_basica
    $guardar_educacion_basica = $conexion->prepare("INSERT INTO educacion_basica (id_usuario, titulo_obtenido, primaria, secundaria, media, fecha_grado) VALUES (?,?,?,?,?,?)");
    $guardar_educacion_basica->bind_param("isssss", $id_usuario, $titulo_obtenido, $primaria, $secundaria, $media, $fecha_grado);
    $guardar_educacion_basica->execute();

    // Insertar datos en la tabla educacion_superior
    $guardar_educacion_superior = $conexion->prepare("INSERT INTO educacion_superior (id_usuario, modalidad_academica, semestres_aprobados, graduado, estudios, fecha_terminacion, tarjeta) 
                                VALUES (?,?,?,?,?,?,?)");
     for ($i = 0; $i < count($modalidad_academica); $i++) {

        $modalidad_academicaActual = $modalidad_academica[$i];
        $semestres_aprobadosActual = $semestres_aprobados[$i];
        $graduadoActual = $graduado[$i] ?? '';
        $estudiosActual = $estudios[$i];
        $fecha_terminacionActual     = $fecha_terminacion[$i];
        $tarjetaActual = $tarjeta[$i];

        $guardar_educacion_superior->bind_param("issssss", $id_usuario, $modalidad_academicaActual, $semestres_aprobadosActual, $graduadoActual, $estudiosActual, $fecha_terminacionActual, $tarjetaActual);
        $guardar_educacion_superior->execute();
    }

    // Insertar datos en la tabla idiomas
    $guardar_idiomas = $conexion->prepare("INSERT INTO idiomas (id_usuario, idioma, habla, lee, escribe) VALUES (?,?,?,?,?)");
    for ($i = 0; $i < count($idioma); $i++) {

        $idiomaActual  = $idioma[$i];
        $hablaActual   = $habla[$i] ?? '';
        $leeActual     = $lee[$i] ?? '';
        $escribeActual = $escribe[$i] ?? '';

        $guardar_idiomas->bind_param("issss", $id_usuario, $idiomaActual, $hablaActual, $leeActual, $escribeActual);
        $guardar_idiomas->execute();
    }

    // Insertar datos en la tabla experiencia_laboral
    $guardar_experiencia_laboral = $conexion->prepare("INSERT INTO experiencia_laboral (id_usuario, empresa, tipo_empresa, pais_empresa, depto_empresa, muni_empresa, email_empresa, telefono_empresa,
                                 fecha_ingreso, fecha_retiro, cargo, dependencia, direccion)
                                 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        for ($i = 0; $i < count($empresa); $i++) {

            $empresaActual = $empresa[$i];
            $tipo_empresaActual = $tipo_empresa[$i];
            $pais_empresaActual = $pais_empresa[$i] ?? '';
            $depto_empresaActual = $depto_empresa[$i];
            $muni_empresaActual = $muni_empresa[$i];
            $email_empresaActual = $email_empresa[$i];
            $telefono_empresaActual = $telefono_empresa[$i];
            $fecha_ingresoActual = $fecha_ingreso[$i];
            $fecha_retiroActual = $fecha_retiro[$i];
            $cargoActual = $cargo[$i];
            $dependenciaActual = $dependencia[$i];
            $direccionActual = $direccion[$i];

            $guardar_experiencia_laboral->bind_param("issssssssssss", $id_usuario, $empresaActual, $tipo_empresaActual, $pais_empresaActual, $depto_empresaActual, $muni_empresaActual, $email_empresaActual,
                         $telefono_empresaActual, $fecha_ingresoActual, $fecha_retiroActual, $cargoActual, $dependenciaActual, $direccionActual);

            $guardar_experiencia_laboral->execute();
        }
   

    // Insertar datos en la tabla total_experiencia
    $guardar_total_experiencia = $conexion->prepare("INSERT INTO total_experiencia (id_usuario, meses_servidor, años_servidor, meses_empleado, años_empleado, meses_independiente, años_independiente, meses_total_ex, años_total_ex)
                                 VALUES (?,?,?,?,?,?,?,?,?)");
    $guardar_total_experiencia->bind_param("issssssss", $id_usuario, $meses_servidor, $años_servidor, $meses_empleado, $años_empleado, $meses_independiente, $años_independiente, $meses_total_ex, $años_total_ex);
    $guardar_total_experiencia->execute();

    // Insertar datos en la tabla firmas_observaciones
    $guardar_firmas_observaciones = $conexion->prepare("INSERT INTO firmas_observaciones (id_usuario, causales, ciudad_fecha_diligenciamiento, observaciones, ciudad_fecha_contrato, firma1, firma2)
                                 VALUES (?,?,?,?,?,?,?)");
    $guardar_firmas_observaciones->bind_param("issssss", $id_usuario, $causales, $ciudad_fecha_diligenciamiento, $observaciones, $ciudad_fecha_contrato, $firma1, $firma2);
    $guardar_firmas_observaciones->execute();

    $conexion->commit();

    header("Location: mostrar.php?id=" . $id_usuario);

} catch (Exception $e) {
    $conexion->rollback();
    echo "Error: " . $e->getMessage();
}

?>