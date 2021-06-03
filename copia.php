<?php
require 'database.php';
 //$db = conectarDB();
  
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

    $fechaUno = $_POST['fechaUno'];
$numeroRegistro = $_POST['numeroRegistro'];
$nombre = $_POST['nombre'];
$correoUno = $_POST ['correoUno'];
$tituloProyecto = $_POST['tituloProyecto'];
$nombreConvocatoria = $_POST['nombreConvocatoria'];
$institucionEmite = $_POST['institucionEmite'];
$investigacion = $_POST['investigacion'];
$campo = $_POST['campo'];
$programa = $_POST['programa'];
$cuerpo = $_POST['cuerpo'];
$trabajo = $_POST['trabajo'];
$vinculadas = $_POST['vinculadas'];

$query = "INSERT INTO registro_proyecto (fecha, numero_registro, nombre, correo, titulo_proyecto, nombre_convocatoria, emite_convocatoria, tipo_investigacion, campo_interes, progrmas_educativos, cuerpos_academicos, linea_investigacion, instancias_vinculadas ) VALUES ('$fechaUno', '$numeroRegistro', '$nombre', '$correoUno',  '$tituloProyecto', '$nombreConvocatoria', '$institucionEmite','$investigacion', '$campo', '$programa', '$cuerpo', '$trabajo', '$vinculadas')";

//echo $query;

$resultado = mysqli_query($db, $query);

if($query){
echo "Insertado correctamente";
}

}
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preload" href="/css/normalize.css" as="style"/>
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;1,300&display=swap" rel="stylesheet"/>
    <link rel="preload" href="/css/estilos.css" as="style" />
    <link rel="stylesheet" href="/css/estilos.css" />
  </head>
  <body>


    <header>
      <h1 class="titulo">Registro de Proyecto</h1>
    </header>

<main class="contenedor sombra">

    <form action="" method="POST">

    <section class="fecha input-text">
      <div >
        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha"
                            id="fecha" value="2021-05-15" min="2021-01-01" max="2025-05-15">
      </div>
      <div class>
        <label for="num_registro">Número de registro:</label><br>
        <input type="number" name="num_registro" id="num_registro" class="from">
      </div>
    </section>

    
    <section class="formulario input-text" >
        
            <fieldset>
      <div class="representante">
        <div>
          <label>Representante Técnico del Proyecto</label></br>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre"></br>

          <label for="correo">Correo Electronico:</label>
          <input type="text" name="correo" id="correo">
        </div>

        <div>
            <label for="titulo_proyecto">Título del proyecto</label>
            <input type="text" name="titulo_proyecto" id="titulo_proyecto">
        </div>

        <div>
            <label for="nombre_convocatoria">Nombre de la convocatoria</label>
            <input type="text" name="nombre_convocatoria" id="nombre_convocatoria">
        </div>

        <div>
            <label for="inst_emite_convocatoria">Institución que emite la convocatoria:</label>
            <input type="text" name="inst_emite_convocatoria" id="inst_emite_convocatoria">
        </div>

      </div>
      </fieldset>
        
    </section>

        <section class="formulario">
            
                <fieldset class="">
                    <div class="representante">
                <div>
                    <legend>Tipo de investigación:</legend>
                    <div class="campo">
                    <input type="radio" id="Basica" name="tipo_investigacion" value="Basica" >
                    <label for="basica">Basica</label>
                    </div>
                    <div class="campo">
                    <input type="radio" id="Aplicada" name="tipo_investigacion" value="Aplicada">
                    <label for="aplicada">Aplicada</label>
                    </div>
                    <div class="campo">
                    <input type="radio" name="tipo_investigacion" id="Innovacion" value="Innovacion">
                    <label for="innovacion">Innovación Tecnológica</label>
                    </div>
                </div>

                <div>
                    <legend>Campo de interés:</legend>

                    <div class="campo">
                    <input type="radio" name="campo_interes" id="Ciencias_naturales" value="Ciencias_naturales">
                    <label>Ciencias naturales</label>
                    </div>
                    <div class="campo">
                    <input type="radio" name="campo_interes" id="ingenieria_y_Tecnologia" value="ingenieria_y_Tecnologia">
                    <label>Ingenieria y Tecnologia</label>
                    </div>
                    <div class="campo">
                    <input type="radio" name="campo_interes" id="Ciencias_Sociales" value="Ciencias_Soiales">
                    <label>Ciencias sociales</label>
                    </div>
                </div>
            </div>
                </fieldset>
            
        </section>

        <section class="formulario input-text">
            
                <fieldset>
                    <div class>
                    <div>
                    <label for="nom_programas_educativos">Nombre del o de los programa&#40;s&#41; educativo&#40;s&#41; donde se realiza el proyecto:</label>
                    <input type="text" name="nom_programas_educativos" id="nom_programas_educativos" >
                    </div>
                    <div>
                        <label for="nom_cuerpos_academicos">Nombre del/de los&#41; Cuerpo&#40;s&#41; Académico&#40;s&#41; participante&#40;s&#41; en el proyecto:</label>
                        <input type="text" name="nom_cuerpos_academicos" id="nom_cuerpos_academicos">
                    </div>
                    <div>
                        <label for="linea_investigacion_trabajo">Linea de investigación o trabajo:</label>
                        <input type="text"  name="linea_investigacion_trabajo" id="linea_investigacion_trabajo">
                    </div>
                    <div>
                        <label>¿Están vinculadas instituciones externas en el desarrollo del proyecto?</label><br>
                        <label for="opcion">Sí</label>
                        <input type="radio" name="hay_instituciones_vinculadas" id="Si" value="Si">

                        <label for="opcion">No</label>
                        <input type="radio" name="hay_instituciones_vinculadas" id="No" value="No">
                        <div>
                            <label for="nombre_instituciones_vinculadas">Nombre de las instituciones Externas vinculadas:</label>
                            <input type="text" name="nombre_instituciones_vinculadas" id="nombre_instituciones_vinculadas" >
                        </div>
                    </div>
                </div>
                </fieldset>
            
        </section>

        <section class="formulario input-text">
            
                <fieldset>
                    <div>
                        <div>
                            <label for="fecha">Fecha tentativa de inicio del proyecto:</label>
                            <input type="date" name="fecha_tentativa_inicio"
                            id="fecha_tentativa_inicio" value="2021-05-15" min="2021-01-01" max="2025-05-15">
                        </div>
                        <div>
                            <label for="">Duración del proyecto:</label>
                            <input type="text" name="duracion_proyecto" id="duracion_proyecto">
                        </div>
                    </div>
                </fieldset>
            
        </section>

        <section class="formulario sectionArea">
            <fieldset>
                <div>
                    <label for="obj_general">Objetivo General del proyecto</label>
                    <textarea name="obj_general" id="obj_general" cols="59" rows="10"></textarea>
                </div>
            </fieldset>
        </section>

        <section class="formulario sectionArea">
            <fieldset>
                <div>
                    <label for="obj_especificos">Objetivos Específicos</label>
                    <textarea name="obj_especificos" id="obj_especificos" cols="59" rows="10"></textarea>
                </div>
            </fieldset>
        </section>  

        <section class="input-text">
            <h2 class="titulo">Investigadores &#40;as&#41; Participantes</h2>
            <div class="participantes formulario">
                <div>
                    <label>No.</label><br>
                    <label>1</label><br>
                    <label>2</label><br>
                    <label>3</label><br>
                    <label>4</label><br>
                </div>

                <div>
                    <label>Nombre</label><br>
                    <input type="text" name="nombre_inves_participante" id="nombre_inves_participante"><br>
                    <input type="text" name="nombre_inves_participante" id="nombre_inves_participante"><br>
                    <input type="text" name="nombre_inves_participante" id="nombre_inves_participante"><br>
                    <input type="text" name="nombre_inves_participante" id="nombre_inves_participante"><br>
                </div>

                <div>
                    <label>Adcripción/Institución</label><br>
                    <input type="text" name="adscripcion_inves_participante" id="adscripcion_inves_participante"><br>
                    <input type="text" name="adscripcion_inves_participante" id="adscripcion_inves_participante"><br>
                    <input type="text" name="adscripcion_inves_participante" id="adscripcion_inves_participante"><br>
                    <input type="text" name="adscripcion_inves_participante" id="adscripcion_inves_participante"><br>
                </div>

                <div>
                    <label>Tipo de participación</label><br>
                    <input type="text" name="tipo_participacion" id="tipo_participacion"><br>
                    <input type="text" name="tipo_participacion" id="tipo_participacion"><br>
                    <input type="text" name="tipo_participacion" id="tipo_participacion"><br>
                    <input type="text" name="tipo_participacion" id="tipo_participacion"><br>
                </div>

                <div>
                    <label>Firma</label><br>
                    <input type="text" name="ruta_firma" id="ruta_firma"><br>
                    <input type="text" name="ruta_firma" id="ruta_firma"><br>
                    <input type="text" name="ruta_firma" id="ruta_firma"><br>
                    <input type="text" name="ruta_firma" id="ruta_firma"><br>
                </div>
            </div>
        </section>

        <section class="input-text">
            
                <h2 class="titulo">Estudiantes Participantes</h2>
                <div class="participantes formulario">
                    <div>
                        <label>Nombre Completo</label><br>
                        <input type="text" name="nombre_estudiante" id="nombre_estudiante"><br>
                        <input type="text" name="nombre_estudiante" id="nombre_estudiante"><br>
                        <input type="text" name="nombre_estudiante" id="nombre_estudiante"><br>
                        <input type="text" name="nombre_estudiante" id="nombre_estudiante"><br>
                    </div>

                    <div>
                        <label>Carrera</label><br>
                        <input type="text" name="carrera_estudiante" id="carrera_estudiante"><br>
                        <input type="text" name="carrera_estudiante" id="carrera_estudiante"><br>
                        <input type="text" name="carrera_estudiante" id="carrera_estudiante"><br>
                        <input type="text" name="carrera_estudiante" id="carrera_estudiante"><br>
                    </div>

                    <div>
                        <label>Promedio</label><br>
                        <input type="text" name="promedio_estudiante" id="promedio_estudiante"><br>
                        <input type="text" name="promedio_estudiante" id="promedio_estudiante"><br>
                        <input type="text" name="promedio_estudiante" id="promedio_estudiante"><br>
                        <input type="text" name="promedio_estudiante" id="promedio_estudiante"><br>
                    </div>

                    <div>
                        <label>Matrícula</label><br>
                        <input type="text" name="matricula_estudiante" id="matricula_estudiante"><br>
                        <input type="text" name="matricula_estudiante" id="matricula_estudiante"><br>
                        <input type="text" name="matricula_estudiante" id="matricula_estudiante"><br>
                        <input type="text" name="matricula_estudiante" id="matricula_estudiante"><br>
                    </div>

                    <div>
                        <label>Semestre</label><br>
                        <input type="text" name="semestre_estudiante" id="semestre_estudiante"><br>
                        <input type="text" name="semestre_estudiante" id="semestre_estudiante"><br>
                        <input type="text" name="semestre_estudiante" id="semestre_estudiante"><br>
                        <input type="text" name="semestre_estudiante" id="semestre_estudiante"><br>
                    </div>

                    <div>
                        <label>CURP</label><br>
                        <input type="text" name="curp_estudiante" id="curp_estudiante"><br>
                        <input type="text" name="curp_estudiante" id="curp_estudiante"><br>
                        <input type="text" name="curp_estudiante" id="curp_estudiante"><br>
                        <input type="text" name="curp_estudiante" id="curp_estudiante"><br>
                    </div>

                    <div>
                        <label>RFC</label><br>
                        <input type="text" name="rfc_estudiante" id="rfc_estudiante"><br>
                        <input type="text" name="rfc_estudiante" id="rfc_estudiante"><br>
                        <input type="text" name="rfc_estudiante" id="rfc_estudiante"><br>
                        <input type="text" name="rfc_estudiante" id="rfc_estudiante"><br>
                    </div>

                    <div>
                        <label>Correo electrónico</label><br>
                        <input type="text" name="correo_estudiante" id="correo_estudiante"><br>
                        <input type="text" name="correo_estudiante" id="correo_estudiante"><br>
                        <input type="text" name="correo_estudiante" id="correo_estudiante"><br>
                        <input type="text" name="correo_estudiante" id="correo_estudiante"><br>
                    </div>

                    <div>
                        <label>Teléfono</label><br>
                        <input type="text" name="telefono_estudiante" id="telefono_estudiante"><br>
                        <input type="text" name="telefono_estudiante" id="telefono_estudiante"><br>
                        <input type="text" name="telefono_estudiante" id="telefono_estudiante"><br>
                        <input type="text" name="telefono_estudiante" id="telefono_estudiante"><br>
                    </div>
            </div>
        </section>

        <section>
            <h2 class="titulo">Productos Entregables</h2>
               
                <div class="entregables formulario ">
                    <div>
                        <label>Fromación de Recursos Humanos</label></br>
                        <input type="checkbox" name="recursos" id="incorporacion" value="incorporacion"> 
                            <label for="incorporacion">incorporación de estudiantes</label>
                        </br>
                            <input type="checkbox" name="recursos" id="estudiantes" value="estudiantes">
                            <label for="estudiantes">Estudiantes en residencia</label>
                        </br>
                        <input type="checkbox" name="recursos" id="desarrollo" value="desarrollo">
                        <label for="desarrollo">Tesis de Licenciatura en desarrollo</label>
                     </br>
                        <input type="checkbox" name="recursos" id="concluidas" value="concluidas">
                        <label for="concluidas">Tesis de Licenciatura concluidas</label>
                        </br>
                        <input type="checkbox" name="recursos" id="otros" value="otros">
                        <label for="otros">Otros</label>
                    </br>
                        <label for="especifique">Especifique</label>
                        <input type="text" name="recursos" id="especifique">
                    </div>

                    <div>
                        <label>Productividad académica</label></br>
                        <input type="checkbox" name="productividad" id="bases" value="bases">
                            <label for="bases">Bases de datos</label>
                    </br>
                    <input type="checkbox" name="productividad" id=memorias value="memorias">
                    <label for="memorias">Memorias en extenso en congreso</label>
                </br>
                <input type="checkbox" name="productividad" id="indizadas" value="indizadas">
                <label for="indizadas">Artículos en revistas indizadas</label>
            </br>
            <input type="checkbox" name="productividad" id="arbitradas" value="arbitradas">
                <label for="arbitradas">Artículos en revistas arbitradas</label>
            </br>
            <input type="checkbox" name="productividad" id="divulgacion" value="divulgacion">
                <label for="divulgacion">Artículos de divulgación</label>
            </br>
            <input type="checkbox" name="productividad" id="congreso" value="congreso">
                <label for="congreso">Artículos en memoria de congreso</label>
            </br>
            <input type="checkbox" name="productividad" id="capitulos" value="capitulos">
                <label for="capitulos">Capítulos de libros</label>
            </br>
            <input type="checkbox" name="productividad" id="editados" value="editados">
                <label for="editados">Libros editados y publicados</label>
            </br>
            <input type="checkbox" name="productividad" id="enviados" value="enviados">
                <label for="enviados">Libros enviados para revisón</label>
            </br>
            <input type="checkbox" name="productividad" id="prototipo" value="prototipo">
                <label for="prototipo">Prototipo</label>   
            </br>
            <input type="checkbox" name="productividad" id="patentes" value="patentes">
                <label for="patentes">Patentes enviados para registro</label>    
            </br>
            <input type="checkbox" name="productividad" id="paquetes" value="paquetes">
                <label for="paquetes">Paquetes tecnológicos  enviados para registro</label>
            </br>
            <input type="checkbox" name="productividad" id="otros" value="otros">
                <label for="otros">otros</label>    
            </br>
            <label for="especifique2">Especifique</label> 
            <input type="text" name="productividad" id="especifique2">
                    </div>

            <div>
                <label>Productos en vinculación o extensión</label>
            </br>
            <input type="checkbox" name="productos" id="incorporacion" value="incorporacion">
            <label for="incorporacion">Incorporación de estudiantes a estancias</label>
        </br>
        <input type="checkbox" name="productos" id="estancia" value="estancia">
        <label for="estancia">Estancia de investigador&#40;a&#41;</label>
    </br>
    <input type="checkbox" name="productos" id="residencia" value="residencia">
    <label for="residencia">Estudiantes de residencia en empresa</label>
</br>
<input type="checkbox" name="productos" id="convenios" value="convenios">
<label for="convenios">Convenios de colaboración</label>
</br>
<input type="checkbox" name="productos" id="asesoria" value="asesoria">
<label for="asesoria">Asesoria Técnica</label>
</br>
<input type="checkbox" name="productos" id="prototipos" value="prototipo">
<label for="prototipo">Prototipos</label>
</br>
<input type="checkbox" name="productos" id="piloto" value="piloto">
<label for="piloto">Planta Piloto</label>
</br>
<input type="checkbox" name="productos" id="cursos" value="cursos">
<label for="cursos">Cursos, Diplomados o capacitación</label>
</br>
<input type="checkbox" name="productos" id="donaciones" value="donaciones">
<label for="donaciones">Donaciones</label>
</br>
<input type="checkbox" name="productos" id="beneficios" value="beneficios">
<label for="beneficios">Otros beneficios</label>
</br>
<label for="especifique3">Especifique</label>
<input type="text" name="productos" id="espcifique3">
            </div>                    
                </div>  
        </section>

        <section class="formulario sectionArea">
            
                <div>
                    <label for="impacto">Impacto</label>
                    <textarea name="impacto" id="impacto" cols="59" rows="10"></textarea>
                </div>
            
        </section>

        <section class="input-text">
            <h2 class="titulo">Presupuesto</h2>
            <div class="formulario representante">
                <div>
                    <label>Concepto</label></br>
                    <label for="materiales">Materiales y Suministro</label></br>
                    <label for="servicios">Servicios Generales</label></br>
                    <label>Total</label>
                </div>

                <div>
                    <label>Monto solicitado</label></br>
                    <input type="text" name="materiales_suministro" id="materiales_suministro"></br>
                    <input type="text" name="servicios_generales" id="servicios_generales"></br>
                    <input type="text" name="total" name="total"></br>
                </div>
            </div>
        </section>

        <section class="formulario sectionArea">
            <div class="entregables">
                <div>
                    <textarea name="firma_representante_tecnico" id="representante_tecnico" cols="30" rows="10"></textarea>
                    <label>Representante Técnico</label>
                </div>
                <div>
                    <textarea name="firma_jefe_dep_investigacion" id="firma_jefe_dep_investigacion" cols="30" rows="10"></textarea>
                        <label>Jefatura de Departamento de investigación y Desarrollo Tecnológico</label>
                </div>
                <div>
                    <textarea name="sello_departamento_investigacion" id="sello_departamento_investigacion" cols="30" rows="10"></textarea>
                     <label>Sello del Departamento de Investigación y Desarrollo Tecnológico</label>
                </div>
            </div>
            <div class="alinear-centro flex">
                <input class="boton w-sn-100"  type="submit" value="Enviar">
               </div>
        </section>
        
    </form>
    </main>
  </body>
</html>
