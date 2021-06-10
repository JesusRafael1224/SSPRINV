<?php
require 'database.php';
 $db = conectarDB();

 //Consultas
 $instruccion_formacion = "SELECT * FROM formacion_recursos_humanos";
 $consulta_formacion = mysqli_query($db, $instruccion_formacion);

 $instruccion_productividad = "SELECT * FROM productividad_academica";
 $consulta_productividad = mysqli_query($db, $instruccion_productividad);

 $instruccion_productos = "SELECT * FROM productos_vinculacion";
 $consulta_productos = mysqli_query($db, $instruccion_productos);

 $instruccion_tipo = "SELECT * FROM tipo_investigacion";
 $consulta_tipo_investigacion = mysqli_query($db, $instruccion_tipo);

$instruccion_campo = "SELECT * FROM campo_interes";
$consulta_campo_interes = mysqli_query($db, $instruccion_campo);

 //Arreglo de errores
 $errores = [];

    $fecha = '';
    $num_registro = '';
    $formacion = '';
    $tipo_investigacion = '';
    $campo_interes = '';
    $productividad_academica = '';
    $productos_vinculacion = '';

  
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

$fecha = $_POST['fecha'];
$num_registro = $_POST['num_registro'];
$nombre = $_POST['nombre'];
$correo = $_POST ['correo'];
$titulo_proyecto = $_POST['titulo_proyecto'];
$nombre_convocatoria = $_POST['nombre_convocatoria'];
$inst_emite_convocatoria = $_POST['inst_emite_convocatoria'];
$tipo_investigacion = $_POST['tipo_investigacion'];
$campo_interes = $_POST['campo_interes'];
$nom_programas_educativos = $_POST['nom_programas_educativos'];
$nom_cuerpos_academicos = $_POST['nom_cuerpos_academicos'];
$linea_investigacion_trabajo = $_POST['linea_investigacion_trabajo'];
$nombre_instituciones_vinculadas = $_POST['nombre_instituciones_vinculadas'];
//$formacion = $_POST ['formacion'];
//$productividad_academica = $_POST['productividad_academica'];

 //$query = "call `new_proyecto`('$fecha', '$num_registro')";

$query = "INSERT INTO registro_proyecto (fecha, num_registro, nombre, correo, titulo_proyecto, nombre_convocatoria, inst_emite_convocatoria, tipo_investigacion, campo_interes, nom_programas_educativos, nom_cuerpos_academicos, linea_investigacion_trabajo, nombre_instituciones_vinculadas ) VALUES ('$fecha', '$num_registro', '$nombre', '$correo',  '$titulo_proyecto', '$nombre_convocatoria', '$inst_emite_convocatoria','$tipo_investigacion', '$campo_interes', '$nom_programas_educativos', '$nom_cuerpos_academicos', '$linea_investigacion_trabajo', '$nombre_instituciones_vinculadas')";

//echo $query;

$insertar = mysqli_query($db, $query);
if($insertar){
echo "Insertado correctamente";
}

}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preload" href="/css/normalize.css" as="style"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<link rel="preload" href="/css/style.css" as="style" />
    <link rel="stylesheet" href="/css/style.css">
  </head>
<body>

<header class="header">
    <a href="alta_usuario.php">
    <img src="/image/logotecnologico.png" alt="Logotipo" class="header__logo">
    </a>
    <h2>Nuevo proyecto</h2>
</header>

<main class="contenedor sombra">

<form action="" method="POST" class="">

<h3>Favor de llenar todos los apartados</h3>

<section class="formulario">
<div>
<label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha"
                            id="fecha" value="2021-05-15" min="2021-01-01" max="2025-05-15">
</div>
<div>
<label for="num_registro">Número de registro:</label><br>
        <input type="number" name="num_registro" id="num_registro" class="from" min="1">
</div>
</section>

<section class="formulario">
<legend>Representante técnico del proyecto</legend>
<div class="input-text representante">
<div>
        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre">

          <label for="correo">Correo Electronico:</label>
          <input type="text" name="correo" id="correo">
        </div>

        <div>
            <label for="titulo_proyecto">Título del proyecto</label>
            <input type="text" name="titulo_proyecto" id="titulo_proyecto">
        </div>
</div>
<div>
        <div>
            <label for="nombre_convocatoria">Nombre de la convocatoria</label>
            <input type="text" name="nombre_convocatoria" id="nombre_convocatoria">
        </div>

        <div>
            <label for="inst_emite_convocatoria">Institución que emite la convocatoria:</label>
            <input type="text" name="inst_emite_convocatoria" id="inst_emite_convocatoria">
        </div>
</div>
</div>
</section>

<section class="formulario">
<div class="representante">
<div>
<legend>Tipo de investigación</legend>
            <select name="tipo_investigacion" id="tipo_investigacion">
                <option disabled selected>--Tipo de investigacion--</option>
                <?php while($row = mysqli_fetch_assoc($consulta_tipo_investigacion) ): ?>
                                        <option <?php echo $tipo_investigacion === $row['idtipo_investigacion'] ? 'selected' : ''; ?> value="<?php echo $row['idtipo_investigacion'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
            
            </select>
</div>
<div>
                    <legend>Campo de interés:</legend>
            <select name="campo_interes" id="campo_interes">
                <option value="" disabled selected>--Campo de interes--</option>
                <?php while($row = mysqli_fetch_assoc($consulta_campo_interes) ): ?>
                <option  <?php echo $campo_interes === $row['idcampo_interes'] ? 'selected' : ''; ?> value=" <?php echo $row['idcampo_interes'] ?> "> <?php echo $row['dato']; ?> </option>
            
            <?php endwhile; ?>
            </select>      

</div>
</section>

<section class="formulario">
<div class="input-text representante">
    <div>
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
                    </div>
                    <div>
                    <div>
                        <label>¿Están vinculadas instituciones externas en el desarrollo del proyecto?</label><br>
                        <select name="" id="">
                            <option value="si" selected>Si</option>
                            <option value="no">No</option>
                        </select>
                        <div>
                            <label for="nombre_instituciones_vinculadas">Nombre de las instituciones Externas vinculadas:</label>
                            <input type="text" name="nombre_instituciones_vinculadas" id="nombre_instituciones_vinculadas" >
                        </div>
                    
                </div>
                </div>

</section>

<section class="formulario">
<div class="input-text representante">
                        <div>
                            <label for="fecha_tentativa_inicio">Fecha tentativa de inicio del proyecto:</label>
                            <input type="date" name="fecha_tentativa_inicio"
                            id="fecha_tentativa_inicio" value="2021-05-15" min="2021-01-01" max="2025-05-15">
                        </div>
                        <div>
                            <label for="">Duración del proyecto:</label>
                            <input type="text" name="duracion_proyecto" id="duracion_proyecto">
                        </div>
                    </div>
</section>

<section class="formulario">
<div class="input-text representante">
<div>
                    <legend>Objetivo General del proyecto</legend>
                    <textarea name="obj_general" id="obj_general" cols="40" rows="10"></textarea>
</div>
<div>
                    <legend>Objetivos Específicos del proyecto</legend>
                    <textarea name="obj_especificos" id="obj_especificos" cols="40" rows="10"></textarea>
</div>
</div>

</section>

<section class="formulario"> 
<legend>Investigadores &#40;as&#41; Participantes</legend>
<div class="participantes">
       
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

<section class="formulario">
<legend>Estudiantes participantes</legend>
<div class="grid4">
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

<section class="formulario">
    <legend>Productos entregables</legend>
    <div class="representante">
                    <div>
                    <legend>Fromación de Recursos Humanos</legend>
                    <select name="formacion" id="formacion">
                                    <option disabled selected>--Formación de Recursos Humanos--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_formacion) ): ?>
                                        <option <?php echo $formacion === $row['idformacion_recursos_humanos'] ? 'selected' : ''; ?> value="<?php echo $row['idformacion_recursos_humanos'] ?>"> <?php echo $row['dato']; ?> </option>
                                        
                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros</label><br>
                                <label for="especifique3">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique3">
                    </div>
                    <div>
                    <legend>Productividad académica</legend>
                    <select name="productividad_academica" id="productividad_academica">
                                    <option disabled selected >--Productividad académica--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_productividad) ): ?>
                                        <option <?php echo $productividad_academica === $row['idproductos_entregables'] ? 'selected' : ''; ?> value="<?php echo $row['idproductos_entregables'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros</label><br>
                                <label for="especifique3">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique3">
                                 </div>

                                 <div>
                                 <legend>Productos en vinculación o extensión</legend>
                                 <select name="productividad" id="productividad">
                                    <option disabled selected >--Productos en vinculación o extensión--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_productos) ): ?>
                                        <option <?php echo  $productos_vinculacion === $row['idproductos_vinculacion'] ? 'selected' : ''; ?> value="<?php echo $row['idproductos_vinculacion'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros</label><br>
                                <label for="especifique3">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique3">
                                 </div>
     </div>     
</section>

<section class="formulario flex alinear-centro">
<div>
                    <legend>Impacto</legend>
                    <textarea name="impacto" id="impacto" cols="70" rows="10"></textarea>
                </div>
</section>

<section class="formulario">
<legend>Presupuesto</legend>
<div class="formulario representante">
                <div>
                    <legend>Concepto</legend></br>
                    <label for="materiales">Materiales y Suministro</label></br>
                    <label for="servicios">Servicios Generales</label></br>
                    <label>Total</label>
                </div>

                <div>
                    <legend>Monto solicitado</legend></br>
                    <input type="text" name="materiales_suministro" id="materiales_suministro"></br>
                    <input type="text" name="servicios_generales" id="servicios_generales"></br>
                    <input type="text" name="total" name="total"></br>
                </div>
            </div>
</section>

<section class="formulario">
<div class="grid3">
                <div>
                    <textarea name="representante_tecnico" id="representante_tecnico" cols="25" rows="10"></textarea>
                    <legend>Representante Técnico</legend>
                </div>
                <div>
                    <textarea name="firma_jefe_dep_investigacion" id="firma_jefe_dep_investigacion" cols="25" rows="10"></textarea>
                        <legend>Jefatura de Departamento de investigación y Desarrollo Tecnológico</legend>
                </div>
                <div>
                    <textarea name="sello_departamento_investigacion" id="sello_departamento_investigacion" cols="25" rows="10"></textarea>
                     <legend>Sello del Departamento de Investigación y Desarrollo Tecnológico</legend>
                </div>
                <div class="regresar">
                                <a href="registro_proyecto.php" class="boton boton__regresar">Regresar</a>
                            </div>
                            <div class="registrar">
                            <input type="submit" class="boton boton__registrar" value="Registrar">
                            </div>
            </div>
</section>
</form>
</main>
 
<footer class="footer">
    <img src="/image/logofooter.PNG" alt="Logotipo" class="footer__logo">
</footer>
</body>
</html>