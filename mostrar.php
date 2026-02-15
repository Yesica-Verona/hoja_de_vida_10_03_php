<?php
$host = 'localhost:3309';
$usuario = 'root';
$contrasena = '';
$basedatos = 'hv_1003';

$conexion = new mysqli($host, $usuario, $contrasena, $basedatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id_usuario = $_GET['id'] ?? 0;

if ($id_usuario == 0) {
    die("ID no válido");
}
$i = 0;
//consulta datos de la tabla datos_personales
$sentencia = $conexion->prepare("SELECT * FROM datos_personales WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$datos_personales = $sentencia->get_result()->fetch_assoc();

//consulta datos de la tabla educacion_basica
$sentencia = $conexion->prepare("SELECT * FROM educacion_basica WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$educacion_basica = $sentencia->get_result()->fetch_assoc();

//consulta datos de la tabla educacion_superior 
$sentencia = $conexion->prepare("SELECT * FROM educacion_superior WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$educacion_superior = $sentencia->get_result();

//consulta datos de la tabla idiomas
$sentencia = $conexion->prepare("SELECT * FROM idiomas WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$idiomas = $sentencia->get_result();

//consulta datos de la tabla experiencia_laboral
$sentencia = $conexion->prepare("SELECT * FROM experiencia_laboral WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$experiencia = $sentencia->get_result();

//consulta datos de la tabla total_experiencia
$sentencia = $conexion->prepare("SELECT * FROM total_experiencia WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$total_experiencia = $sentencia->get_result()->fetch_assoc();

//consulta datos de la tabla firmas_observaciones
$sentencia = $conexion->prepare("SELECT * FROM firmas_observaciones WHERE id_usuario = ?");
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$firmas_observaciones = $sentencia->get_result()->fetch_assoc();

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hoja de vida</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <form action="procesar.php" method="POST">
      <div class="encabezado">
        <div class="imagen">
          <img src="img/escudo.jpg" alt="" width="100px" />
        </div>
        <div class="texto">
          <h3>FORMATO ÚNICO</h3>
          <h2>HOJA DE VIDA</h2>
          <p>Persona Natural</p>
          <p>(Leyes 190 de 1995, 489 y 443 de 1998)</p>
        </div>
        <div class="entidad-receptora">
          <label style="font-style: normal;"> ENTIDAD RECEPTORA</label>
          <br />
          <input type="text" name="entidad_receptora" value="<?php echo $datos_personales['entidad_receptora']; ?>" disabled/>
        </div>
      </div>
      <div class="titulo">
        <h4>1</h4>
        <h4>DATOS PERSONALES</h4>
      </div>
      <div class="contenedor">
         <div class="form_datos_personales">
            <div class="campo col-3">
              <label>PRIMER APELLIDO</label>
              <input type="text" name="primer_apellido" value="<?php echo $datos_personales['primer_apellido']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>SEGUNDO APELLIDO (O DE CASADA)</label>
              <input type="text" name="segundo_apellido" value="<?php echo $datos_personales['segundo_apellido']; ?>" disabled />
           </div>
           <div class="campo col-4">
              <label>NOMBRES</label>
              <input type="text" name="nombres" value="<?php echo $datos_personales['nombres']; ?>" disabled/>
           </div>
           <div class="campo col-4">
              <label>DOCUMENTO DE IDENTIFICACIÓN</label>
              <div class="inline">
                 <label style="font-style: normal;"><input type="radio" disabled 
                      <?php if($datos_personales['doc_identificacion'] == 'cedula') echo 'checked'; ?>>C.C
                 </label>
                 <label style="font-style: normal;"><input type="radio" disabled 
                      <?php if($datos_personales['doc_identificacion'] == 'extranjeria') echo 'checked'; ?>>C.E
                 </label>
                 <label style="font-style: normal;"><input type="radio" disabled 
                      <?php if($datos_personales['doc_identificacion'] == 'pasaporte') echo 'checked'; ?>>PAS
                 </label>
                 <label style="font-style: normal;">N°</label>  
                 <input type="text" name="num_identificacion" class="line-input" value=" <?php echo $datos_personales['num_identificacion']; ?>" disabled>
              </div>
           </div>
           <div class="campo col-1">
              <label>SEXO</label>
              <div class="inline">
                 <label style="font-style: normal;"><input type="radio" name="genero" disabled 
                      <?php if($datos_personales['genero'] == 'femenino') echo 'checked'; ?>> F
                 </label>
                 <label style="font-style: normal;"><input type="radio" name="genero" disabled
                     <?php if($datos_personales['genero'] == 'masculino') echo 'checked'; ?>> M
                 </label>
             </div>
           </div>
           <div class="campo col-5">
              <label>NACIONALIDAD</label>
              <div class="inline">
                 <label style="font-style: normal;"><input type="radio" name="nacionalidad" disabled
                     <?php if($datos_personales['nacionalidad'] == 'colombiano') echo 'checked'; ?>> COL
                 </label>
                <label style="font-style: normal;"><input type="radio" name="nacionalidad" disabled
                     <?php if($datos_personales['nacionalidad'] == 'extranjero') echo 'checked'; ?>> EXTRANJERO</label>
                <label>PAÍS</label>
                <input type="text" name="pais_nacionalidad" class="line-input" value=" <?php echo $datos_personales['pais_nacionalidad']; ?>" disabled>
             </div>
           </div>
           <div class="campo col-10">
             <label>LIBRETA MILITAR</label>
              <div class="inline">
                  <label style="font-style: normal;">PRIMERA CLASE<input type="radio" name="libreta_militar" disabled
                     <?php if($datos_personales['libreta_militar'] == 'segunda') echo 'checked'; ?>>
                  </label>
                  <label style="font-style: normal;"> SEGUNDA CLASE<input type="radio" name="libreta_militar" disabled
                     <?php if($datos_personales['libreta_militar'] == 'primera') echo 'checked'; ?>> 
                  </label>
                <label style="font-style: normal;">NUMERO</label>
                <input type="text" class="line-input" name="num_libreta" value="<?php echo $datos_personales['num_libreta']; ?>" disabled>
                <label style="font-style: normal;">DISTRITO</label>
                <input type="text" class="line-input" name="distrito" value="<?php echo $datos_personales['distrito']; ?>" disabled>
             </div>
           </div>
           <div class="campo col-5">
              <label>FECHA Y LUGAR DE NACIMIENTO<label>
                <div>
                  <label style="font-style: normal;">FECHA</label>
                  <input type="date" name="fecha_nacimiento" value="<?php echo $datos_personales['fecha_nacimiento']; ?>" disabled ><br>
                  <label style="font-style: normal;">PAÍS</label>
                  <input type="text" class="line-input" name="pais_nacimiento" value=" <?php echo $datos_personales['pais_nacimiento']; ?>" disabled><br>
                  <label style="font-style: normal;">DEPARTAMENTO</label>
                  <input type="text" class="line-input" name="depto_nacimiento" value=" <?php echo $datos_personales['depto_nacimiento']; ?>" disabled><br>
                  <label style="font-style: normal;">MUNICIPIO</label>
                  <input type="text" class="line-input" name="muni_nacimiento" value=" <?php echo $datos_personales['muni_nacimiento']; ?>" disabled>
                </div>
           </div>
           <div class="campo col-5">
              <label>DIRECCIÓN DE CORRESPONDENCIA<label> <br>
              <input type="text" class="line-input" name="correspondencia" value=" <?php echo $datos_personales['correspondencia']; ?>" disabled/>
                <div>
                  <label style="font-style: normal;">PAÍS</label>
                  <input type="text" class="line-input" name="pais_correspondencia" value=" <?php echo $datos_personales['pais_correspondencia']; ?>" disabled>
                  <label style="font-style: normal;">DEPARTAMENTO</label>
                  <input type="text" class="line-input" name="depto_correspondencia" value=" <?php echo $datos_personales['depto_correspondencia']; ?>" disabled><br>
                  <label style="font-style: normal;">MUNICIPIO</label>
                  <input type="text" class="line-input" name="muni_correspondencia" value=" <?php echo $datos_personales['muni_correspondencia']; ?>" disabled><br>
                  <label style="font-style: normal;">TELEFONO</label>
                  <input type="text" class="line-input" name="telefono" value=" <?php echo $datos_personales['telefono']; ?>" disabled>
                  <label style="font-style: normal;">EMAIL</label>
                  <input type="text" class="line-input" name="correo" value=" <?php echo $datos_personales['correo']; ?>" disabled>
                </div>
           </div>

         </div>
     </div>
     <div class="titulo">
        <h4>2</h4>
        <h4>FORMACIÓN ACADÉMICA</h4>
      </div>
      <div class="contenedor" style="padding:10px;">
        <p style="font-weight: bold; font-style: italic;">EDUCACIÓN BÁSICA Y MEDIA</p> <br>
        <p>MARQUE CON UNA X EL ÚLTIMO GRADO APROBADO ( LOS GRADOS DE 1o. A 6o. DE BACHILLERATO EQUIVALEN A LOS GRADOS 6o. A 11o. DE EDUCACIÓN BÁSICA SECUNDARIA Y MEDIA )</p>
         <table style="width: 80%;">
            <thead>
              <tr>
                <th colspan="3" >EDUCACIÓN BÁSICA</th>
                <th>
                  TITULO OBTENIDO:<input type="text" name="titulo_obtenido" value=" <?php echo $educacion_basica['titulo_obtenido']; ?>" disabled />
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <label>PRIMARIA</label> <br><br>
                   1° <input type="radio" name="primaria" value="primero" disabled <?php if($educacion_basica['primaria'] == 'primero') echo 'checked'; ?> /> 
                   2° <input type="radio" name="primaria" value="segundo" disabled <?php if($educacion_basica['primaria'] == 'segundo') echo 'checked'; ?> /> 
                   3° <input type="radio" name="primaria" value="tercero" disabled <?php if($educacion_basica['primaria'] == 'tercero') echo 'checked'; ?> /> 
                   4° <input type="radio" name="primaria" value="cuarto"  disabled <?php if($educacion_basica['primaria'] == 'cuarto') echo 'checked'; ?> /> 
                   5° <input type="radio" name="primaria" value="quinto"  disabled <?php if($educacion_basica['primaria'] == 'quinto') echo 'checked'; ?> />
                </td>
                <td><label>SECUNDARIA</label> <br><br>
                   6° <input type="radio" name="secundaria" value="sexto" disabled <?php if($educacion_basica['secundaria'] == 'sexto') echo 'checked'; ?> />
                   7° <input type="radio" name="secundaria" value="septimo" disabled <?php if($educacion_basica['secundaria'] == 'septimo') echo 'checked'; ?> />
                   8° <input type="radio" name="secundaria" value="octavo" disabled <?php if($educacion_basica['secundaria'] == 'octavo') echo 'checked'; ?> />
                   9° <input type="radio" name="secundaria" value="noveno" disabled <?php if($educacion_basica['secundaria'] == 'noveno') echo 'checked'; ?> />
                </td>
                <td> <label>MEDIA</label> <br><br>
                   10° <input type="radio" name="media" value="decimo" disabled <?php if($educacion_basica['media'] == 'decimo') echo 'checked'; ?> /> 
                   11° <input type="radio" name="media" value="undecimo" disabled <?php if($educacion_basica['media'] == 'undecimo') echo 'checked'; ?> />
                </td>
                <td >FECHA DE GRADO
                  <input type="date"  name="fecha_grado" value="<?php echo $educacion_basica['fecha_grado']; ?>" disabled/>
                </td>
              </tr>
            </tbody>
          </table>
          <hr style="border: #000 1px solid; margin-bottom:10px;">
          <p style="font-weight: bold; font-style: italic;">EDUCACION SUPERIOR (PREGRADO Y POSTGRADO)</p> <br>
          <p>DILIGENCIE ESTE PUNTO EN ESTRICTO ORDEN CRONOLÓGICO, EN MODALIDAD ACADÉMICA ESCRIBA:</p>
          <div class="form_modalidad_academica">
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">TC </p>
                <p>(TÉCNICA),</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">TL </p>
                <p>(TECNOLÓGICA),</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">TE  </p>
                <p>(TECNOLÓGICA ESPECIALIZADA),,</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">UN  </p>
                <p>(UNIVERSITARIA),</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">ES  </p>
                <p>(ESPECIALIZACIÓN),</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">MG  </p>
                <p>(MAESTRÍA O MAGISTER),</p>
              </div>
            </div>
            <div class="col-1">
              <div class="inline">
                <p style="font-weight: bold;">DOC  </p>
                <p>(DOCTORADO O PHD),</p>
              </div>
            </div>
          </div>
          <p>ELACIONE AL FRENTE EL NÚMERO DE LA TARJETA PROFESIONAL (SI ÉSTA HA SIDO PREVISTA EN UNA LEY).</p><br>
          <table style="width:100%" id="tablaEstudios">
            <thead>
              <tr>
                <th rowspan="2">MODALIDAD ACADÉMICA</th>
                <th rowspan="2">N° SEMESTRES APROBADOS</th>
                <th colspan="2">GRADUADO</th>
                <th rowspan="2">NOMBRE DE LOS ESTUDIOS O TÍTULO OBTENIDO</th>
                <th rowspan="2">FECHA TERMINACIÓN</th>
                <th rowspan="2">No. DE TARJETA PROFESIONAL</th>
              </tr>
              <tr>
                <th>si</th>
                <th>no</th>
              </tr>
            </thead>
            <tbody>
              <?php while($fila_educacion = $educacion_superior->fetch_assoc()): ?>
              <tr>
                <td><input type="text" name="modalidad_academica[]" value="<?php echo $fila_educacion['modalidad_academica']; ?>" disabled></td>
                <td><input type="text" name="semestres_aprobados[]" value="<?php echo $fila_educacion['semestres_aprobados']; ?>" disabled ></td>
                <td><input type="radio" name="graduado_<?= $i ?>" value="si" <?php if($fila_educacion['graduado'] == 'si') echo 'checked'; ?> disabled></td>
                <td><input type="radio" name="graduado_<?= $i ?>" value="no" <?php if($fila_educacion['graduado'] == 'no') echo 'checked'; ?> disabled></td>
                <td><input type="text" name="estudios[]" value="<?php echo $fila_educacion['estudios']; ?>" disabled></td>
                <td><input type="date" name="fecha_terminacion[]" value="<?php echo $fila_educacion['fecha_terminacion']; ?>" disabled></td>
                <td><input type="text" name="tarjeta[]" value="<?php echo $fila_educacion['tarjeta']; ?>" disabled></td>
              </tr>
              <?php $i++; endwhile; ?>
            </tbody>   
          </table>
          <hr style="border: #000 1px solid; margin-bottom:10px;">
          <div class="inline">
            <p>ESPECÍFIQUE LOS IDIOMAS DIFERENTES AL ESPAÑOL QUE: HABLA, LEE, ESCRIBE DE FORMA, REGULAR </p><p style="font-weight: bold;">(R),</p> BIEN <p style="font-weight: bold;">(B)</p> O MUY BIEN<p style="font-weight: bold;">(MB)</p>
          </div>
          <br>
          <table style="width:60%" id="tablaIdiomas">
             <thead>
               <tr>
                 <th rowspan="2">IDIOMA</th>
                 <th colspan="3">LO HABLA</th>
                 <th colspan="3">LO LEE</th>
                 <th colspan="3">LO ESCRIBE</th>
               </tr>
               <tr>
                 <th>R</th>
                 <th>B</th>
                 <th>MB</th>
                 <th>R</th>
                 <th>B</th>
                 <th>MB</th>
                 <th>R</th>
                 <th>B</th>
                 <th>MB</th>
               </tr>
             </thead>
             <tbody>
                <?php while($fila_idioma = $idiomas->fetch_assoc()): ?>
               <tr>
                 <td><input type="text" name="idioma[]" value="<?php echo $fila_idioma['idioma']; ?>" disabled></td>
                 <td><input type="radio" name="habla_<?= $i ?>" value="regular" <?php if($fila_idioma['habla'] == 'regular') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="habla_<?= $i ?>" value="bueno" <?php if($fila_idioma['habla'] == 'bueno') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="habla_<?= $i ?>" value="muy bueno" <?php if($fila_idioma['habla'] == 'muy bueno') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="lee_<?= $i ?>" value="regular" <?php if($fila_idioma['lee'] == 'regular') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="lee_<?= $i ?>" value="bueno" <?php if($fila_idioma['lee'] == 'bueno') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="lee_<?= $i ?>" value="muy bueno" <?php if($fila_idioma['lee'] == 'muy bueno') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="escribe_<?= $i ?>" value="regular" <?php if($fila_idioma['escribe'] == 'regular') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="escribe_<?= $i ?>" value="bueno" <?php if($fila_idioma['escribe'] == 'bueno') echo 'checked'; ?> disabled></td>
                 <td><input type="radio" name="escribe_<?= $i ?>" value="muy bueno" <?php if($fila_idioma['escribe'] == 'muy bueno') echo 'checked'; ?> disabled></td>
                </tr>
                <?php $i++; endwhile; ?>
             </tbody>
          </table>
      </div>
      <div class="titulo">
        <h4>3</h4>
        <h4>EXPERIENCIA LABORAL</h4>
      </div>
      <div class="contenedor">
        <br>
        <p>RELACIONE SU EXPERIENCIA LABORAL O DE PRESTACIÓN DE SERVICIOS EN ESTRICTO ORDEN CRONOLÓGICO COMENZANDO POR EL ACTUAL.</p>
        <br>
        <?php while($fila_experiencia = $experiencia->fetch_assoc()): ?>
        <div id="contenedor_experiencias">
        <div class="form_experiencia_laboral">
          <div class="empleo-contrato col-9">
            <p>EMPLEO O CONTRATO</p>
          </div>
           <div class="campo col-4">
              <label>EMPRESA O ENTIDAD</label>
              <input type="text" name="empresa[]" value="<?php echo $fila_experiencia['empresa']; ?>" disabled />
           </div>
            <div class="campo col-1">
              <label>PÚBLICA</label>
              <input type="radio" name="tipo_empresa_<?= $i ?>" value="publica" <?php if($fila_experiencia['tipo_empresa'] == 'publica') echo 'checked'; ?> disabled />
           </div>
           <div class="campo col-1">
              <label>PRIVADA</label>
              <input type="radio" name="tipo_empresa_<?= $i ?>" value="privada" <?php if($fila_experiencia['tipo_empresa'] == 'privada') echo 'checked'; ?> disabled/>
           </div>
           <div class="campo col-3">
              <label>PAÍS</label>
              <input type="text" name="pais_empresa[]" value="<?php echo $fila_experiencia['pais_empresa']; ?>" disabled />
           </div>
           <div class="campo col-3">
              <label>DEPARTAMENTO</label>
              <input type="text" name="depto_empresa[]" value="<?php echo $fila_experiencia['depto_empresa']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>MUNICIPIO</label>
              <input type="text" name="muni_empresa[]" value="<?php echo $fila_experiencia['muni_empresa']; ?>" disabled />
           </div>
           <div class="campo col-3">
              <label>CORREO ELECTRÓNICO ENTIDAD</label>
              <input type="email" name="email_empresa[]"  value="<?php echo $fila_experiencia['email_empresa']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>TELÉFONOS</label>
              <input type="text" name="telefono_empresa[]" value="<?php echo $fila_experiencia['telefono_empresa']; ?>" disabled />
           </div>
           <div class="campo col-3">
              <label> FECHA DE INGRESO</label>
              <input type="date" name="fecha_ingreso[]" value="<?php echo $fila_experiencia['fecha_ingreso']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>FECHA DE RETIRO</label>
              <input type="date" name="fecha_retiro[]" value="<?php echo $fila_experiencia['fecha_retiro']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>CARGO O CONTRATO  ACTUAL</label>
              <input type="text" name="cargo[]" value="<?php echo $fila_experiencia['cargo']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>DEPENDENCIA</label>
              <input type="text" name="dependencia[]" value="<?php echo $fila_experiencia['dependencia']; ?>" disabled/>
           </div>
           <div class="campo col-3">
              <label>DIRECCIÓN</label>
              <input type="text" name="direccion[]" value="<?php echo $fila_experiencia['direccion']; ?>" disabled />
           </div>
        </div>
        </div>
         <?php $i++; endwhile; ?>
      </div>
      <br>
       <div class="titulo">
          <h4>4</h4>
          <h4>TIEMPO TOTAL DE EXPERIENCIA</h4>
      </div>
      <div class="contenedor" style="padding: 10px;">
        <br>
        <p>NDIQUE EL TIEMPO TOTAL DE SU EXPERIENCIA LABORAL EN NÚMERO DE AÑOS Y MESES.</p>
        <br>
        <table style="width:80%">
          <thead>
            <tr>
              <th rowspan="2">OCUPACIÓN</th>
              <th colspan="2">TIEMPO DE EXPERIENCIA</th>
            </tr>
            <tr>
               <th>MESES</th>
               <th>AÑOS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-style: italic;">SERVIDOR PÚBLICO</td>
              <td style="text-align: center;"><input type="text" name="meses_servidor" value="<?php echo $total_experiencia['meses_servidor']; ?>" disabled ></td>
              <td style="text-align: center;"><input type="text" name="años_servidor" value="<?php echo $total_experiencia['años_servidor']; ?>" disabled ></td>
            </tr>
            <tr>
              <td style="font-style: italic;">EMPLEADO DEL SECTOR PRIVADO</td>
              <td style="text-align: center;"><input type="text" name="meses_empleado" value="<?php echo $total_experiencia['meses_empleado']; ?>" disabled ></td>
              <td style="text-align: center;"><input type="text" name="años_empleado" value="<?php echo $total_experiencia['años_empleado']; ?>" disabled ></td>
            </tr>
            <tr>
              <td style="font-style: italic;">TRABAJADOR INDEPENDIENTE</td>
              <td style="text-align: center;"><input type="text" name="meses_independiente" value="<?php echo $total_experiencia['meses_independiente']; ?>" disabled ></td>
              <td style="text-align: center;"><input type="text" name="años_independiente" value="<?php echo $total_experiencia['años_independiente']; ?>" disabled ></td>
            </tr>
            <tr>
              <td style="font-weight: bold; font-style: italic;">TOTAL TIEMPO EXPERIENCIA</td>
              <td style="text-align: center;"><input type="text" name="meses_total_ex" value="<?php echo $total_experiencia['meses_total_ex']; ?>" disabled ></td>
              <td style="text-align: center;"><input type="text" name="años_total_ex" value="<?php echo $total_experiencia['años_total_ex']; ?>" disabled ></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="titulo">
          <h4>5</h4>
          <h4>FIRMA DEL SERVIDOR PÚBLICO O CONTRATISTA</h4>
      </div>
      <div class="contenedor" style="padding: 10px;">
        <div class="inline">
          <p>MANIFIESTO BAJO LA GRAVEDAD DEL JURAMENTO QUE </p> SI </p>
          <input type="radio" name="causales" value="SI" <?php if($firmas_observaciones['causales'] == 'SI') echo 'checked'; ?> disabled /> 
           <p>NO</p> <input type="radio" name="causales" value="NO" <?php if($firmas_observaciones['causales'] == 'no') echo 'checked'; ?> disabled/><p>ME ENCUENTRO DENTRO DE LAS CAUSALES DE INHABILIDAD E INCOMPATIBILIDAD DEL ORDEN
            CONSTITUCIONAL O LEGAL, PARA EJERCER CARGOS EMPLEOS PÚBLICOS O PARA
            CELEBRAR CONTRATOS DE PRESTA CIÓN DE SERVICIOS CON LA ADMINISTRACIÓN PÚBLICA.
          </p>
          <p>
            PARA TODOS LOS EFECTOS LEGALES, CERTIFICO QUE LOS DATOS POR MI
            ANOTADOS EN EL PRESENTE FORMATO ÚNICO DE HOJA DE VIDA, SON VERACES,
            (ARTÍCULO 5o. DE LA LEY 190/95).
          </p>
        </div>
        <br><br>
        <div class="inline">
          <label> Ciudad y fecha de diligenciamiento</label>
          <input type="text" style="width: 700px" class="line-input" name="ciudad_fecha_diligenciamiento" value="<?php echo $firmas_observaciones['ciudad_fecha_diligenciamiento']; ?>" disabled />
        </div>
        <br>
        <div class="firma">               
           <img src="<?php echo $firmas_observaciones['firma1']; ?>" width="300">
           <br />
           <label>FIRMA DEL SERVIDOR PÚBLICO O CONTRATISTA</label>
        </div>
      </div>
      <div class="titulo">
          <h4>6</h4>
          <h4>OBSERVACIONES DEL JEFE DE RECURSOS HUMANOS Y/O CONTRATOS</h4>
      </div>
      <div class="contenedor" style="padding: 10px; margin-bottom: 100px">
          <br>
          <textarea name="observaciones" id="" rows="5" style="width: 100%;  background: #eefcff;" disabled><?php echo $firmas_observaciones['observaciones']; ?></textarea><br><br>
          <p>
            CERTIFICO QUE LA INFORMACIÓN AQUÍ SUMINISTRADA HA SIDO CONSTATADA
            FRENTE A LOS DOCUMENTOS QUE HAN SIDO PRESENTADOS COMO SOPORTE.
          </p>
          <br>
          <div class="inline" style="justify-self: center;">
              <div>
                <input type="text" style="width:400px;" class="line-input" name="ciudad_fecha_contrato"  value="<?php echo $firmas_observaciones['ciudad_fecha_contrato']; ?>" disabled/>
                <br>
                <label>Ciudad y fecha</label>
             </div>
             <div>
                  <img src="<?php echo $firmas_observaciones['firma2']; ?>" width="300"> <br>
                  <label>NOMBRE Y FIRMA DEL JEFE DE PERSONAL O DE CONTRATOS</label>
            </div>
          </div>
      </div>
      <nav class="navbar" style="
        position: fixed; 
        bottom: 0;      
        left: 0;          
        width: 100%;    
        background-color: #f0f0f0;
        color: white;
        display: flex;
        align-items: center;
        height: 50px;
        z-index: 1000;">
        <a onClick="history.go(-1);" style="background: #82365a; font-size: 15px; color: white; padding: 10px 20px 10px 20px; border-radius: 5px; border: none; cursor: pointer; margin-left: 100px;">VOLVER A EDITAR</a>
        <a href="file_hoja_de_vida.php?id=<?php echo $id_usuario; ?>" style="background: green; font-size: 15px; color: white; padding: 10px 20px 10px 20px; border-radius: 5px; border: none; cursor: pointer; margin-left: 30px;">GENERAR PDF</a>
      </nav>
    </form>
  </body>
</html>