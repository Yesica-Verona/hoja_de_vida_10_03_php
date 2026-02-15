<?php
require_once 'libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

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

ob_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hoja de vida</title>
    <style>
        @page{
          margin: 60px 50px 10px 50px;
        }
        body {
          font-family: Arial, sans-serif;
          font-size: 10px;
        }
        label {
          font-style: italic;
        }
       
        .encabezado {
          width: 100%;
          display: flex;
          border-radius: 20px;
          border: 2px solid black;
          box-shadow: 8px 8px 0px rgba(0, 0, 0, 1);
          justify-content: space-evenly;
          text-align: center;
          align-items: center;
        }

        h4 {   
          background: #000;
          color: #ffff;
          border-radius: 30px;
          padding-top: 5px;
          padding-bottom: 5px;
          padding-left: 10px;
          padding-right: 10px;
        }
        input[type="radio"] {
          width: 10px;
          height: 10px;
        }
       input {
          border: none;
          outline: none;
          height: 10px;
          background: #eefcff;
          font-size: 10px;
          text-transform: uppercase;
        }
        input[type="text"] {
          padding: 2px;
          background: #eefcff;
        }
        .line-input {
          border-bottom: 1px solid black;
        }
        table {
          border: #000 0.5px solid;
          margin-top: 10px;
          margin-bottom: 10px;
          padding: 10px;
          align-items: center;
          justify-self: center;
        }
        table,
        tr,
        th,
        td {
          border: #000 0.5px solid;
          border-collapse: collapse;  
        }
        th {
          font-weight: normal;
          font-style: italic;
          background: #d6f2f8;
        }
        .firma {
          justify-self: center;
          text-align: center;
        }
   </style>
  </head>
  <body>
    <form action="procesar.php" method="POST">
      <div class="encabezado">
          <table style="border: none; border-collapse: collapse; margin: 0; padding: 0; width: 100%; justify-content: space-evenly; text-align: center; align-items: center;">
            <tr style="border: none;">
              <td style="border: none;">
                <img src="http://localhost/HV_1003_PHP/img/escudo.jpg" width="80">
              </td>
              <td style="border: none;">
                <h3>FORMATO ÚNICO</h3>
                <h2>HOJA DE VIDA</h2>
                <p>Persona Natural</p>
                <p>(Leyes 190 de 1995, 489 y 443 de 1998)</p>
              </td>
              <td style="border: none;">
                <label style="font-style: normal;"> ENTIDAD RECEPTORA</label>
                <br />
                <input type="text" name="entidad_receptora" value="<?php echo $datos_personales['entidad_receptora']; ?>" disabled/>
              </td>
           </tr> 
         </table>
        
      </div>
      <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
        <h4 style="display: inline-block; margin: 0 10px 0 0;">1</h4>
        <h4 style="display: inline-block; margin: 0;">DATOS PERSONALES</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000;  display: inline-block; padding: 10px; z-index: 1;">
          <div style="background: #eefcff; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative;">
              <table style="border-collapse: collapse; margin: 0; padding: 0; width: 100%;"> 
                 <tr>
                    <td colspan="3">
                      <label>PRIMER APELLIDO</label><br>
                      <input type="text" name="primer_apellido" value="<?php echo $datos_personales['primer_apellido']; ?>" disabled/>
                    </td>
                    <td colspan="3">
                      <label>SEGUNDO APELLIDO (O DE CASADA)</label> <br>
                      <input type="text" name="segundo_apellido" value="<?php echo $datos_personales['segundo_apellido']; ?>" disabled />
                    </td>
                    <td colspan="4">
                      <label>NOMBRES</label> <br>
                      <input type="text" name="nombres" value="<?php echo $datos_personales['nombres']; ?>" disabled/>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="4">
                      <label>DOCUMENTO DE IDENTIFICACIÓN</label> <br>
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
                    </td>
                    <td colspan="1">
                        <label>SEXO</label> <br>
                        <label style="font-style: normal;"><input type="radio" name="genero" disabled 
                         <?php if($datos_personales['genero'] == 'femenino') echo 'checked'; ?>> F
                       </label>
                       <label style="font-style: normal;"><input type="radio" name="genero" disabled
                          <?php if($datos_personales['genero'] == 'masculino') echo 'checked'; ?>> M
                     </label>
                    </td>
                    <td colspan="5">
                       <label>NACIONALIDAD</label> <br>
                       <label style="font-style: normal;"><input type="radio" name="nacionalidad" disabled
                          <?php if($datos_personales['nacionalidad'] == 'colombiano') echo 'checked'; ?>> COL
                      </label>
                      <label style="font-style: normal;"><input type="radio" name="nacionalidad" disabled
                          <?php if($datos_personales['nacionalidad'] == 'extranjero') echo 'checked'; ?>> EXTRANJERO
                      </label>
                      <label>PAÍS</label>
                      <input type="text" name="pais_nacionalidad" class="line-input" value=" <?php echo $datos_personales['pais_nacionalidad']; ?>" disabled>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="10">
                      <label>LIBRETA MILITAR</label> <br>      
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
                    </td>
                 </tr>
                 <tr>
                    <td colspan="4">
                      <label>FECHA Y LUGAR DE NACIMIENTO<label> <br>            
                      <label style="font-style: normal;">FECHA</label>
                      <input type="date" name="fecha_nacimiento" value="<?php echo $datos_personales['fecha_nacimiento']; ?>" disabled ><br>
                      <label style="font-style: normal;">PAÍS</label>
                      <input type="text" class="line-input" name="pais_nacimiento" value=" <?php echo $datos_personales['pais_nacimiento']; ?>" disabled><br>
                      <label style="font-style: normal;">DEPARTAMENTO</label>
                      <input type="text" class="line-input" name="depto_nacimiento" value=" <?php echo $datos_personales['depto_nacimiento']; ?>" disabled><br>
                      <label style="font-style: normal;">MUNICIPIO</label>
                      <input type="text" class="line-input" name="muni_nacimiento" value=" <?php echo $datos_personales['muni_nacimiento']; ?>" disabled>               
                    </td>
                    <td colspan="6">
                      <label>DIRECCIÓN DE CORRESPONDENCIA<label> <br>
                      <input type="text" class="line-input" name="correspondencia" value=" <?php echo $datos_personales['correspondencia']; ?>" disabled/>
                      <br>
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
                    </td>
                 </tr>
              </table>
          </div>
       </div>
     </div>
     <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
        <h4 style="display: inline-block; margin: 0 10px 0 0;">2</h4>
        <h4 style="display: inline-block; margin: 0;">FORMACIÓN ACADÉMICA</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000;  display: inline-block; padding: 10px; z-index: 1;">
          <div style="background: #eefcff; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative;">
              <p style="font-weight: bold; font-style: italic;">EDUCACIÓN BÁSICA Y MEDIA</p>
              <p>MARQUE CON UNA X EL ÚLTIMO GRADO APROBADO ( LOS GRADOS DE 1o. A 6o. DE BACHILLERATO EQUIVALEN A LOS GRADOS 6o. A 11o. DE EDUCACIÓN BÁSICA SECUNDARIA Y MEDIA )</p>
              <table style="width: 80% margin: 0 0 5px 0; padding: 0; margin-left: auto;  margin-right: auto;" >
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
              <p style="font-weight: bold; font-style: italic;">EDUCACION SUPERIOR (PREGRADO Y POSTGRADO)</p>
              <p>DILIGENCIE ESTE PUNTO EN ESTRICTO ORDEN CRONOLÓGICO, EN MODALIDAD ACADÉMICA ESCRIBA:</p>
              <table style="border: none; border-collapse: collapse; margin: 0; padding: 0; width: 100%;">
                  <tr style="border: none;">
                      <td style="border: none;">
                           <p style="display: inline-block; margin: 0; font-weight: bold;">TC</p>
                           <p style="display: inline-block; margin: 0;">(TÉCNICA),</p>
                      </td>
                      <td style="border: none;">
                           <p style="display: inline-block; margin: 0; font-weight: bold;">TL</p>
                           <p style="display: inline-block; margin: 0;">(TECNOLÓGICA),</p>
                      </td>
                      <td style="border: none;">
                          <p style="display: inline-block; margin: 0; font-weight: bold;">TE</p>
                          <p style="display: inline-block; margin: 0;">(TECNOLÓGICA ESPECIALIZADA),</p>
                      </td>
                      <td style="border: none;">
                          <p style="display: inline-block; margin: 0; font-weight: bold;">UN</p>
                          <p style="display: inline-block; margin: 0;">(UNIVERSITARIA),</p>
                      </td>
                  </tr>
                  <tr style="border: none;">
                      <td style="border: none;"> 
                          <p style="display: inline-block; margin: 0; font-weight: bold;">ES</p>
                          <p style="display: inline-block; margin: 0;">(ESPECIALIZACIÓN),</p>
                      </td>
                      <td style="border: none;">
                          <p style="display: inline-block; margin: 0; font-weight: bold;">MG</p>
                          <p style="display: inline-block; margin: 0;">(MAESTRÍA O MAGISTER),</p>
                      </td>
                      <td style="border: none;">
                          <p style="display: inline-block; margin: 0; font-weight: bold;">DOC</p>
                          <p style="display: inline-block; margin: 0;">(DOCTORADO O PHD)</p>
                      </td>    
                  </tr>
              </table>
              <p>RELACIONE AL FRENTE EL NÚMERO DE LA TARJETA PROFESIONAL (SI ÉSTA HA SIDO PREVISTA EN UNA LEY).</p>
              <table style="margin: 0; padding: 0; width: 100%;" id="tablaEstudios">
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
                       <tr style="page-break-inside:avoid;">
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
              <table style="border: none; border-collapse: collapse; margin: 0; padding: 0; width: 100%;">
                  <tr style="border: none;">
                      <td style="border: none;">
                           <p style="display: inline-block; margin: 0;">ESPECÍFIQUE LOS IDIOMAS DIFERENTES AL ESPAÑOL QUE: HABLA, LEE, ESCRIBE DE FORMA, REGULAR </p>
                           <p style="display: inline-block; margin: 0; font-weight: bold;">(R),</p>
                           <p style="display: inline-block; margin: 0;">BIEN</p>
                           <p style="display: inline-block; margin: 0; font-weight: bold;">(B),</p>
                           <p style="display: inline-block; margin: 0;">O MUY BIEN</p>
                           <p style="display: inline-block; margin: 0; font-weight: bold;">(MB)</p>
                      </td>
                  </tr>
              </table>         
              <table style="width: 60%; margin: 0 0 5px 0; padding: 0; margin-left: auto;  margin-right: auto;" id="tablaIdiomas">
                  <thead>
                       <tr style="page-break-inside:avoid;">>
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
                      <tr style="page-break-inside:avoid;">
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
         </div>
       </div>
      <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
        <h4 style="display: inline-block; margin: 0 10px 0 0;">3</h4>
        <h4 style="display: inline-block; margin: 0;">EXPERIENCIA LABORAL</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000;  display: inline-block; padding: 10px; z-index: 1;">
          <div style="background: #eefcff; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative;">
            <p>RELACIONE SU EXPERIENCIA LABORAL O DE PRESTACIÓN DE SERVICIOS EN ESTRICTO ORDEN CRONOLÓGICO COMENZANDO POR EL ACTUAL.</p>
            <?php while($fila_experiencia = $experiencia->fetch_assoc()): ?>
            <table style="border-collapse: collapse; margin: 0; padding: 0; width: 100%;">>
              <tr>
                <td colspan="9" style="text-align: center; font-style: italic; background: #d6f2f8;">
                  <p>EMPLEO ACTUAL O CONTRATO VIGENTE</p>
               </td>
              </tr>
              <tr>
                <td colspan="4">
                  <label>EMPRESA O ENTIDAD</label> <br>
                  <input type="text" name="empresa[]" value="<?php echo $fila_experiencia['empresa']; ?>" disabled />
                </td>
                <td colspan="1">
                  <label>PÚBLICA</label>
                  <input type="radio" name="tipo_empresa_<?= $i ?>" value="publica" <?php if($fila_experiencia['tipo_empresa'] == 'publica') echo 'checked'; ?> disabled />
                </td>
                <td colspan="1">
                  <label>PRIVADA</label>
                  <input type="radio" name="tipo_empresa_<?= $i ?>" value="privada" <?php if($fila_experiencia['tipo_empresa'] == 'privada') echo 'checked'; ?> disabled/>
                </td>
                <td colspan="3">
                  <label>PAÍS</label> <br>
                  <input type="text" name="pais_empresa[]" value="<?php echo $fila_experiencia['pais_empresa']; ?>" disabled />
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <label>DEPARTAMENTO</label> <br>
                  <input type="text" name="depto_empresa[]" value="<?php echo $fila_experiencia['depto_empresa']; ?>" disabled/>
                </td>
                <td colspan="3">
                  <label>MUNICIPIO</label> <br>
                  <input type="text" name="muni_empresa[]" value="<?php echo $fila_experiencia['muni_empresa']; ?>" disabled />
                </td>
                <td colspan="3">
                  <label>CORREO ELECTRÓNICO ENTIDAD</label> <br>
                  <input type="email" name="email_empresa[]"  value="<?php echo $fila_experiencia['email_empresa']; ?>" disabled/>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <label>TELÉFONO</label><br>
                  <input type="text" name="telefono_empresa[]" value="<?php echo $fila_experiencia['telefono_empresa']; ?>" disabled />
                </td>
                <td colspan="3">
                  <label> FECHA DE INGRESO</label><br>
                  <input type="date" name="fecha_ingreso[]" value="<?php echo $fila_experiencia['fecha_ingreso']; ?>" disabled/>
                </td>
                <td colspan="3">
                  <label>FECHA DE RETIRO</label><br>
                  <input type="date" name="fecha_retiro[]" value="<?php echo $fila_experiencia['fecha_retiro']; ?>" disabled/>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <label>CARGO O CONTRATO  ACTUAL</label><br>
                  <input type="text" name="cargo[]" value="<?php echo $fila_experiencia['cargo']; ?>" disabled/>
                </td>
                <td colspan="3">
                  <label>DEPENDENCIA</label><br>
                  <input type="text" name="dependencia[]" value="<?php echo $fila_experiencia['dependencia']; ?>" disabled/>
                </td>
                <td colspan="3">
                  <label>DIRECCIÓN</label><br>
                  <input type="text" name="direccion[]" value="<?php echo $fila_experiencia['direccion']; ?>" disabled />
                </td>
              </tr>
            </table>
            <?php $i++; endwhile; ?>
          </div>
        </div>
      </div>
       <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
          <h4 style="display: inline-block; margin: 0 10px 0 0;">4</h4>
          <h4 style="display: inline-block; margin: 0;">TIEMPO TOTAL DE EXPERIENCIA</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000; width: 100%;  display: inline-block; padding: 10px; z-index: 1;  ">
          <div style="background: #eefcff; width: 100%; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative; ">
          <p>NDIQUE EL TIEMPO TOTAL DE SU EXPERIENCIA LABORAL EN NÚMERO DE AÑOS Y MESES.</p>
          <table style="width: 80% margin: 0 0 5px 0; padding: 0; width: 90%; margin-left: auto;  margin-right: auto;">
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
        </div>
      </div>
      
      <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
          <h4 style="display: inline-block; margin: 0 10px 0 0;">5</h4>
          <h4 style="display: inline-block; margin: 0;">FIRMA DEL SERVIDOR PÚBLICO O CONTRATISTA</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000;  display: inline-block; padding: 10px; z-index: 1;  ">
          <div style="background: #eefcff; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative; ">
            <table style="border: none; border-collapse: collapse; margin: 0; padding: 5px; width: 100%;">
              <tr style="border: none;">
                <td style="border: none;">
                  <p>MANIFIESTO BAJO LA GRAVEDAD DEL JURAMENTO QUE SI 
                  <input type="radio" name="causales" value="SI" <?php if($firmas_observaciones['causales'] == 'SI') echo 'checked'; ?> disabled /> 
                  NO <input type="radio" name="causales" value="NO" <?php if($firmas_observaciones['causales'] == 'no') echo 'checked'; ?> disabled/>ME ENCUENTRO DENTRO DE LAS CAUSALES DE INHABILIDAD E INCOMPATIBILIDAD DEL ORDEN
                  CONSTITUCIONAL O LEGAL, PARA EJERCER CARGOS EMPLEOS PÚBLICOS O PARA CELEBRAR CONTRATOS DE PRESTA CIÓN DE SERVICIOS CON LA ADMINISTRACIÓN PÚBLICA.
                 </p>
                 <p>
                  PARA TODOS LOS EFECTOS LEGALES, CERTIFICO QUE LOS DATOS POR MI
                  ANOTADOS EN EL PRESENTE FORMATO ÚNICO DE HOJA DE VIDA, SON VERACES,
                  (ARTÍCULO 5o. DE LA LEY 190/95).
                </p>
                </td>
              </tr>
              <tr style="border: none;">
                <td style="border: none;">
                  <label> Ciudad y fecha de diligenciamiento</label>
                  <input type="text" style="width: 300px" class="line-input" name="ciudad_fecha_diligenciamiento" value="<?php echo $firmas_observaciones['ciudad_fecha_diligenciamiento']; ?>" disabled />
                  <br>
                            
                </td>
              </tr>
              <tr style="border: none; justify-self: center;">
                <td style="border: none; justify-self: center;">
                  <div class="firma">               
                    <img src="<?php echo $firmas_observaciones['firma1']; ?>" width="200">
                    <br />
                   <label>FIRMA DEL SERVIDOR PÚBLICO O CONTRATISTA</label>
                 </div>
                </td>
              </tr>
            </table>          
          </div> 
        </div>
      </div>
      <div class="titulo" style="margin-top: 20px; margin-bottom: 20px;">
          <h4 style="display: inline-block; margin: 0 10px 0 0;">6</h4>
          <h4 style="display: inline-block; margin: 0;">OBSERVACIONES DEL JEFE DE RECURSOS HUMANOS Y/O CONTRATOS</h4>
      </div>
      <div style="position: relative; width: 100%; padding: 10px;">
        <div style="background: #000;  display: inline-block; padding: 10px; z-index: 1;  ">
          <div style="background: #eefcff; margin-left: -20px; margin-top: -20px; border: 1px solid #000; z-index: 2; position: relative;  padding: 10px;">
             <textarea name="observaciones" id="" rows="5" style="width: 100%;  background: #eefcff;" disabled><?php echo $firmas_observaciones['observaciones']; ?></textarea>
              <p>
               CERTIFICO QUE LA INFORMACIÓN AQUÍ SUMINISTRADA HA SIDO CONSTATADA
               FRENTE A LOS DOCUMENTOS QUE HAN SIDO PRESENTADOS COMO SOPORTE.
              </p>
              <table style="border: none; border-collapse: collapse; margin: 0; padding: 5px; width: 100%;">
                <tr style="border: none;">
                  <td style="border: none;">
                    <input type="text" style="width:100%" class="line-input" name="ciudad_fecha_contrato"  value="<?php echo $firmas_observaciones['ciudad_fecha_contrato']; ?>" disabled/>
                    <label>Ciudad y fecha</label>
                  </td> 
                  <td style="border: none;">
                    <img src="<?php echo $firmas_observaciones['firma2']; ?>" width="200"> <br>
                    <label>NOMBRE Y FIRMA DEL JEFE DE PERSONAL O DE CONTRATOS</label>
                  </td> 
                </tr> 
              </table>
            </div>
        </div>
      </div>
    </form>
  </body>
</html>

<?php
$html = ob_get_clean();


$options = new Options();
$options->set('isRemoteEnabled', true); // para imágenes
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // vertical
$dompdf->render();

// Mostrar en navegador
$dompdf->stream("archivo_hoja_de_vida.pdf", ["Attachment" => false]);
?>