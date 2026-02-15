<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hoja de vida</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body>
    <form action="procesar.php" method="POST" onsubmit="return prepararEnvio()">
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
          <input type="text" name="entidad_receptora" />
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
              <input type="text" name="primer_apellido" />
           </div>
           <div class="campo col-3">
              <label>SEGUNDO APELLIDO (O DE CASADA)</label>
              <input type="text" name="segundo_apellido" />
           </div>
           <div class="campo col-4">
              <label>NOMBRES</label>
              <input type="text" name="nombres" />
           </div>
           <div class="campo col-4">
              <label>DOCUMENTO DE IDENTIFICACIÓN</label>
              <div class="inline">
                <label style="font-style: normal;"><input type="radio" name="doc_identificacion" value="cedula"> C.C</label>
                <label style="font-style: normal;"><input type="radio" name="doc_identificacion" value="extranjeria"> C.E</label>
                <label style="font-style: normal;"><input type="radio" name="doc_identificacion" value="pasaporte"> PAS</label>
                <label style="font-style: normal;">N°</label>
               <input type="text" name="num_identificacion" class="line-input">
              </div>
           </div>
           <div class="campo col-1">
              <label>SEXO</label>
              <div class="inline">
                <label style="font-style: normal;"><input type="radio" name="genero" value="femenino"> F</label>
                <label style="font-style: normal;"><input type="radio" name="genero" value="masculino"> M</label>
             </div>
           </div>
           <div class="campo col-5">
              <label>NACIONALIDAD</label>
              <div class="inline">
                <label style="font-style: normal;"><input type="radio" name="nacionalidad" value="colombiano"> COL</label>
                <label style="font-style: normal;"><input type="radio" name="nacionalidad" value="extranjero"> EXTRANJERO</label>
                <label>PAÍS</label>
                <input type="text" name="pais_nacionalidad" class="line-input">
             </div>
           </div>
           <div class="campo col-10">
             <label>LIBRETA MILITAR</label>
              <div class="inline">
                <label style="font-style: normal;">PRIMERA CLASE<input type="radio" name="libreta_militar" value="segunda"></label>
                <label style="font-style: normal;"> SEGUNDA CLASE<input type="radio" name="libreta_militar" value="primera"></label>
                <label style="font-style: normal;">NUMERO</label>
                <input type="text" class="line-input" name="num_libreta">
                <label style="font-style: normal;">DISTRITO</label>
                <input type="text" class="line-input" name="distrito">
             </div>
           </div>
           <div class="campo col-5">
              <label>FECHA Y LUGAR DE NACIMIENTO<label>
                <div>
                  <label style="font-style: normal;">FECHA</label>
                  <input type="date" name="fecha_nacimiento" ><br>
                  <label style="font-style: normal;">PAÍS</label>
                  <input type="text" class="line-input" name="pais_nacimiento"><br>
                  <label style="font-style: normal;">DEPARTAMENTO</label>
                  <input type="text" class="line-input" name="depto_nacimiento"><br>
                  <label style="font-style: normal;">MUNICIPIO</label>
                  <input type="text" class="line-input" name="muni_nacimiento">
                </div>
           </div>
           <div class="campo col-5">
              <label>DIRECCIÓN DE CORRESPONDENCIA<label> <br>
              <input type="text" class="line-input" name="correspondencia"/>
                <div>
                  <label style="font-style: normal;">PAÍS</label>
                  <input type="text" class="line-input" name="pais_correspondencia">
                  <label style="font-style: normal;">DEPARTAMENTO</label>
                  <input type="text" class="line-input" name="depto_correspondencia"><br>
                  <label style="font-style: normal;">MUNICIPIO</label>
                  <input type="text" class="line-input" name="muni_correspondencia"><br>
                  <label style="font-style: normal;">TELEFONO</label>
                  <input type="text" class="line-input" name="telefono">
                  <label style="font-style: normal;">EMAIL</label>
                  <input type="text" class="line-input" name="correo">
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
                  TITULO OBTENIDO:<input type="text" name="titulo_obtenido" />
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <label>PRIMARIA</label> <br><br>
                   1° <input type="radio" name="primaria" value="primero" /> 
                   2° <input type="radio" name="primaria" value="segundo" /> 
                   3° <input type="radio" name="primaria" value="tercero" /> 
                   4° <input type="radio" name="primaria" value="cuarto" /> 
                   5° <input type="radio" name="primaria" value="quinto" />
                </td>
                <td><label>SECUNDARIA</label> <br><br>
                   6° <input type="radio" name="secundaria" value="sexto" />
                   7° <input type="radio" name="secundaria" value="septimo" />
                   8° <input type="radio" name="secundaria" value="octavo" />
                   9° <input type="radio" name="secundaria" value="noveno" />
                </td>
                <td> <label>MEDIA</label> <br><br>
                   10° <input type="radio" name="media" value="decimo" /> 
                   11° <input type="radio" name="media" value="undecimo" />
                </td>
                <td >FECHA DE GRADO
                  <input type="date" style="margin-left:20px;" name="fecha_grado"/>
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
                <th rowspan="2">ACCIÓN</th>
              </tr>
              <tr>
                <th>si</th>
                <th>no</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="modalidad_academica[]"></td>
                <td><input type="text" name="semestres_aprobados[]"></td>
                <td><input type="radio" name="graduado[0]" value="si"></td>
                <td><input type="radio" name="graduado[0]" value="no"></td>
                <td><input type="text" name="estudios[]"></td>
                <td><input type="date" name="fecha_terminacion[]"></td>
                <td><input type="text" name="tarjeta[]"></td>
                <td><button style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" type="button" onclick="eliminarFila(this)" ><i class="bi bi-dash"></i>Eliminar</button></td>
              </tr>
            </tbody>
              <button style="padding: 5px; background: #159305; border:none; border-radius:5px; color: white;" type="button" onclick="agregarFila()"><i class="bi bi-plus"></i>Agregar</button>
              <script>
                  let contador_estudios = 1;

                  function agregarFila() {
                  const tabla = document.getElementById("tablaEstudios").getElementsByTagName('tbody')[0];
                  const nuevaFila = tabla.insertRow();

                  nuevaFila.innerHTML = `
                      <td><input type="text" name="modalidad_academica[]" required></td>
                      <td><input type="text" name="semestres_aprobados[]" required></td>
                      <td><input type="radio" name="graduado[${contador_estudios}]" value="si" required></td>
                      <td><input type="radio" name="graduado[${contador_estudios}]" value="no"></td>
                      <td><input type="text" name="estudios[]" required></td>
                      <td><input type="date" name="fecha_terminacion[]" required></td>
                      <td><input type="text" name="tarjeta[]" required></td>
                      <td><button style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white; type="button" onclick="eliminarFila(this)"><i class="bi bi-dash"></i>Eliminar</button></td>
                 `;
                  contador_estudios++;
                }

                function eliminarFila(boton) {
                  const fila = boton.parentNode.parentNode;
                  fila.remove();
                }
              </script>
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
                 <th rowspan="3">ACCIÓN</th>
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
               <tr>
                 <td><input type="text" name="idioma[]"></td>
                 <td><input type="radio" name="habla[0]" value="regular"></td>
                 <td><input type="radio" name="habla[0]" value="bueno"></td>
                 <td><input type="radio" name="habla[0]" value="muy bueno"></td>
                 <td><input type="radio" name="lee[0]" value="regular"></td>
                 <td><input type="radio" name="lee[0]" value="bueno"></td>
                 <td><input type="radio" name="lee[0]" value="muy bueno"></td>
                 <td><input type="radio" name="escribe[0]" value="regular"></td>
                 <td><input type="radio" name="escribe[0]" value="bueno"></td>
                 <td><input type="radio" name="escribe[0]" value="muy bueno"></td>
                 <td><button style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" type="button" onclick="eliminarIdioma(this)" ><i class="bi bi-dash"></i>Eliminar</button></td>             
                </tr>
             </tbody>
              <button style="padding: 5px; background: #159305; border:none; border-radius:5px; color: white;" type="button" onclick="agregarIdioma()"><i class="bi bi-plus"></i>Agregar</button>
              <script>
                 let contador_idioma = 1;

                 function agregarIdioma() {

                 const tabla = document
                     .getElementById("tablaIdiomas")
                     .getElementsByTagName('tbody')[0];

                 const fila = tabla.insertRow();

                 fila.innerHTML = `
                    <td><input type="text" name="idioma[]" required></td>

                   <td><input type="radio" name="habla[${contador_idioma}]" value="regular" required></td>
                   <td><input type="radio" name="habla[${contador_idioma}]" value="bueno"></td>
                   <td><input type="radio" name="habla[${contador_idioma}]" value="muy bueno"></td>

                   <td><input type="radio" name="lee[${contador_idioma}]" value="regular" required></td>
                   <td><input type="radio" name="lee[${contador_idioma}]" value="bueno"></td>
                   <td><input type="radio" name="lee[${contador_idioma}]" value="muy bueno"></td>

                   <td><input type="radio" name="escribe[${contador_idioma}]" value="regular" required></td>
                   <td><input type="radio" name="escribe[${contador_idioma}]" value="bueno"></td>
                   <td><input type="radio" name="escribe[${contador_idioma}]" value="muy bueno"></td>

                   <td><button style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" type="button" onclick="eliminarIdioma(this)"><i class="bi bi-dash">Eliminar</button></td>
                 `;
                 contador_idioma++;
                }
                function eliminarIdioma(boton) {
                 boton.closest("tr").remove();
                }

              </script>
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
        <div id="contenedor_experiencias">
        <div class="form_experiencia_laboral">
          <div class="empleo-contrato col-9">
            <p>EMPLEO O CONTRATO</p>
          </div>
           <div class="campo col-4">
              <label>EMPRESA O ENTIDAD</label>
              <input type="text" name="empresa[]" />
           </div>
            <div class="campo col-1">
              <label>PÚBLICA</label>
              <input type="radio" name="tipo_empresa[0]" value="publica" />
           </div>
           <div class="campo col-1">
              <label>PRIVADA</label>
              <input type="radio" name="tipo_empresa[0]" value="privada"/>
           </div>
           <div class="campo col-3">
              <label>PAÍS</label>
              <input type="text" name="pais_empresa[]" />
           </div>
           <div class="campo col-3">
              <label>DEPARTAMENTO</label>
              <input type="text" name="depto_empresa[]" />
           </div>
           <div class="campo col-3">
              <label>MUNICIPIO</label>
              <input type="text" name="muni_empresa[]" />
           </div>
           <div class="campo col-3">
              <label>CORREO ELECTRÓNICO ENTIDAD</label>
              <input type="email" name="email_empresa[]" />
           </div>
           <div class="campo col-3">
              <label>TELÉFONOS</label>
              <input type="text" name="telefono_empresa[]" />
           </div>
           <div class="campo col-3">
              <label> FECHA DE INGRESO</label>
              <input type="date" name="fecha_ingreso[]" />
           </div>
           <div class="campo col-3">
              <label>FECHA DE RETIRO</label>
              <input type="date" name="fecha_retiro[]" />
           </div>
           <div class="campo col-3">
              <label>CARGO O CONTRATO  ACTUAL</label>
              <input type="text" name="cargo[]" />
           </div>
           <div class="campo col-3">
              <label>DEPENDENCIA</label>
              <input type="text" name="dependencia[]" />
           </div>
           <div class="campo col-3">
              <label>DIRECCIÓN</label>
              <input type="text" name="direccion[]" />
           </div>
           <button style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" type="button" onclick="eliminarContenedor(this)"><i class="bi bi-dash"></i>Eliminar</button>

        </div>
        </div>
      </div>
      <br>
      <button style="padding: 5px; background: #159305; border:none; border-radius:5px; color: white;" type="button" onclick="agregarContenedor()"><i class="bi bi-plus"></i>Agregar Experiencia</button>
      <script>
          let contador_experiencias = 1;

          function agregarContenedor() {

           const contenedorPadre = document.getElementById("contenedor_experiencias");
           const nuevo = document.querySelector(".form_experiencia_laboral").cloneNode(true);

           // Limpiar valores de inputs
           nuevo.querySelectorAll("input").forEach(input => {
             if(input.type === "radio"){
              input.checked = false;
            }else{
              input.value = "";
            }
          });

          // Cambiar nombre de radios para que no se mezclen
          nuevo.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.name = "tipo_empresa[" + contador_experiencias + "]";

          });

          contenedorPadre.appendChild(nuevo);
          contador_experiencias++;
         }

          function eliminarContenedor(boton){
           const contenedores = document.querySelectorAll(".form_experiencia_laboral");

           if(contenedores.length > 1){
             boton.parentNode.remove();
            }else{
              alert("Debe existir al menos una experiencia.");
            }
          }
       </script>
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
              <td style="text-align: center;"><input type="text" name="meses_servidor"></td>
              <td style="text-align: center;"><input type="text" name="años_servidor"></></td>
            </tr>
            <tr>
              <td style="font-style: italic;">EMPLEADO DEL SECTOR PRIVADO</td>
              <td style="text-align: center;"><input type="text" name="meses_empleado"></></td>
              <td style="text-align: center;"><input type="text" name="años_empleado"></></td>
            </tr>
            <tr>
              <td style="font-style: italic;">TRABAJADOR INDEPENDIENTE</td>
              <td style="text-align: center;"><input type="text" name="meses_independiente"></></td>
              <td style="text-align: center;"><input type="text" name="años_independiente"></></td>
            </tr>
            <tr>
              <td style="font-weight: bold; font-style: italic;">TOTAL TIEMPO EXPERIENCIA</td>
              <td style="text-align: center;"><input type="text" name="meses_total_ex"></></td>
              <td style="text-align: center;"><input type="text" name="años_total_ex"></></td>
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
          <input type="radio" name="causales" value="SI" /> <p>NO</p> <input type="radio" name="causales" value="NO" /><p>ME ENCUENTRO DENTRO DE LAS CAUSALES DE INHABILIDAD E INCOMPATIBILIDAD DEL ORDEN
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
          <input type="text" style="width: 700px" class="line-input" name="ciudad_fecha_diligenciamiento"/>
        </div>
        <br>
        <div class="firma">
             <canvas id="canvas1" width="400" height="200"></canvas> <br>
             <input type="hidden" name="firma1" id="firma1">
             <button type="button" style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" onclick="limpiar('canvas1')">Limpiar Firma</button>
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
          <textarea name="observaciones" id="" rows="5" style="width: 100%;  background: #eefcff;"></textarea><br><br>
          <p>
            CERTIFICO QUE LA INFORMACIÓN AQUÍ SUMINISTRADA HA SIDO CONSTATADA
            FRENTE A LOS DOCUMENTOS QUE HAN SIDO PRESENTADOS COMO SOPORTE.
          </p>
          <br>
          <div class="inline" style="justify-self: center;">
              <div>
                <input type="text" style="width:400px;" class="line-input" name="ciudad_fecha_contrato" />
                <br>
                <label>Ciudad y fecha</label>
             </div>
             <div>
                 <canvas id="canvas2" width="400" height="200"></canvas>
                 <input type="hidden" name="firma2" id="firma2"> 
                 <br>
                 <button type="button" style="padding: 5px; background: #e53d17; border:none; border-radius:5px; color: white;" onclick="limpiar('canvas2')">Limpiar Firma</button>
                 <br>
                 <label>NOMBRE Y FIRMA DEL JEFE DE PERSONAL O DE CONTRATOS </label>
          </div>
          </div>
      </div>
 <script>
function activarDibujo(canvasId) {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");
    let dibujando = false;

    canvas.addEventListener("mousedown", () => dibujando = true);
    canvas.addEventListener("mouseup", () => {
        dibujando = false;
        ctx.beginPath();
    });

    canvas.addEventListener("mousemove", function(e) {
        if (!dibujando) return;

        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.strokeStyle = "black";

        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    });
}

function limpiar(canvasId) {
    const canvas = document.getElementById(canvasId);
    const ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function prepararEnvio() {
    document.getElementById("firma1").value =
        document.getElementById("canvas1").toDataURL("image/png");

    document.getElementById("firma2").value =
        document.getElementById("canvas2").toDataURL("image/png");

    return true;
}

activarDibujo("canvas1");
activarDibujo("canvas2");
</script>
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
        <button  type="submit" style=" background: #159305; border:none; border-radius:5px; font-size: 15px; color: white; padding: 10px 20px 10px 20px; margin-left: 100px; cursor: pointer;">GUARDAR</button>
         
      </nav>
   
    </form>
  </body>
</html>
