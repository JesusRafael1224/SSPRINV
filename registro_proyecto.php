<?php
require 'database.php';
 $db = conectarDB();
 mysqli_set_charset($db, 'utf8mb4');

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
    $nombre = '';
    $correo = '';
    $titulo_proyecto = '';
    $nombre_convocatoria = '';
    $inst_emite_convocatoria = '';
    $formacion = '';
    $tipo_investigacion = '';
    $campo_interes = '';
    $nom_programas_educativos = '';
    $nom_cuerpos_academicos = '';
    $linea_investigacion_trabajo= '';
    $nombre_instituciones_vinculadas = '';
    $fecha_tentativa_inicio = '';
    $duracion_proyecto = '';
    $obj_general = '';
    $obj_especificos = '';
    $formacion_recursos = '';
    $productividad_academica = '';
    $productos_vinculacion = '';
    $impacto = '';
    $materiales_suministros = '';
    $servicios_generales = '';
    $total = '';
    $firma_representante_tecnico = '';
    $firma_jefe_dep_investigacion = '';
    $sello_departamento_investigacion = '';
  
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

$fecha = mysqli_real_escape_string($db, filter_var($_POST ['fecha'], FILTER_SANITIZE_STRING));
$num_registro = mysqli_real_escape_string($db, filter_var($_POST ['num_registro'], FILTER_SANITIZE_NUMBER_INT));
$nombre = mysqli_real_escape_string($db, filter_var($_POST['nombre'], FILTER_SANITIZE_STRING));
$correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL));
$titulo_proyecto = mysqli_real_escape_string($db, filter_var($_POST['titulo_proyecto'], FILTER_SANITIZE_STRING));
$nombre_convocatoria = mysqli_real_escape_string($db, filter_var($_POST['nombre_convocatoria'], FILTER_SANITIZE_STRING));
$inst_emite_convocatoria = mysqli_real_escape_string($db, filter_var($_POST['inst_emite_convocatoria'], FILTER_SANITIZE_STRING));
$tipo_investigacion = mysqli_real_escape_string($db, filter_var($_POST['tipo_investigacion'], FILTER_SANITIZE_STRING));
$campo_interes = mysqli_real_escape_string($db, filter_var($_POST['campo_interes'], FILTER_SANITIZE_STRING));
$nom_programas_educativos = mysqli_real_escape_string($db, filter_var($_POST['nom_programas_educativos'], FILTER_SANITIZE_STRING));
$nom_cuerpos_academicos = mysqli_real_escape_string($db, filter_var($_POST['nom_cuerpos_academicos'], FILTER_SANITIZE_STRING));
$linea_investigacion_trabajo = mysqli_real_escape_string($db, filter_var($_POST['linea_investigacion_trabajo'], FILTER_SANITIZE_STRING));
$nombre_instituciones_vinculadas = mysqli_real_escape_string($db, filter_var($_POST['nombre_instituciones_vinculadas'], FILTER_SANITIZE_STRING));
$fecha_tentativa_inicio = mysqli_real_escape_string($db, filter_var($_POST['fecha_tentativa_inicio'], FILTER_SANITIZE_STRING));
$duracion_proyecto = mysqli_real_escape_string($db, filter_var($_POST['duracion_proyecto'], FILTER_SANITIZE_STRING));
$obj_general = mysqli_real_escape_string($db, filter_var($_POST['obj_general'], FILTER_SANITIZE_STRING));
$obj_especificos = mysqli_real_escape_string($db, filter_var($_POST['obj_especificos'], FILTER_SANITIZE_STRING));
$formacion_recursos = mysqli_real_escape_string($db, filter_var($_POST['formacion_recursos'], FILTER_SANITIZE_STRING));
$productividad_academica = mysqli_real_escape_string($db, filter_var($_POST['productividad_academica'], FILTER_SANITIZE_STRING));
$productos_vinculacion = mysqli_real_escape_string($db, filter_var($_POST['productos_vinculacion'], FILTER_SANITIZE_STRING));
$impacto = mysqli_real_escape_string($db, filter_var($_POST['impacto'], FILTER_SANITIZE_STRING));
$materiales_suministros = mysqli_real_escape_string($db, filter_var($_POST['materiales_suministros'], FILTER_SANITIZE_NUMBER_INT));
$servicios_generales = mysqli_real_escape_string($db, filter_var($_POST['servicios_generales'], FILTER_SANITIZE_NUMBER_INT));
$total = mysqli_real_escape_string($db, filter_var($_POST['total'], FILTER_SANITIZE_NUMBER_INT));
$firma_representante_tecnico = mysqli_real_escape_string($db, filter_var($_POST['firma_representante_tecnico'], FILTER_SANITIZE_STRING));
$firma_jefe_dep_investigacion = mysqli_real_escape_string($db, filter_var($_POST['firma_jefe_dep_investigacion'], FILTER_SANITIZE_STRING));
$sello_departamento_investigacion = mysqli_real_escape_string($db, filter_var($_POST['sello_departamento_investigacion'], FILTER_SANITIZE_STRING));

if(!$fecha && !$num_registro && !$nombre && !$correo && !$titulo_proyecto && !$nombre_convocatoria && !$inst_emite_convocatoria && !$tipo_investigacion && !$campo_interes && !$nom_programas_educativos && !$nom_cuerpos_academicos && !$linea_investigacion_trabajo && !$nombre_instituciones_vinculadas && !$fecha_tentativa_inicio && !$duracion_proyecto && !$obj_general && !$obj_especificos && !$formacion_recursos && !$productividad_academica && !$productos_vinculacion && !$impacto && !$materiales_suministros && !$servicios_generales && !$total && !$firma_representante_tecnico && !$firma_jefe_dep_investigacion && !$sello_departamento_investigacion){
    $errores[] = "Todos los campos son obligatorios";
}
 //$query = "call `new_proyecto`('$fecha', '$num_registro')";

 if(empty($errores)){

    $query = "INSERT INTO registro_proyecto (fecha, num_registro, nombre, correo, titulo_proyecto, nombre_convocatoria, inst_emite_convocatoria, tipo_investigacion, campo_interes, nom_programas_educativos, nom_cuerpos_academicos, linea_investigacion_trabajo, nombre_instituciones_vinculadas, fecha_tentativa_inicio, duracion_proyecto, obj_general, obj_especificos, formacion_recursos, productividad_academica, productos_vinculacion, impacto, materiales_suministros, servicios_generales, total, firma_representante_tecnico, firma_jefe_dep_investigacion, sello_departamento_investigacion) VALUES ('$fecha', '$num_registro', '$nombre', '$correo', '$titulo_proyecto', '$nombre_convocatoria', '$inst_emite_convocatoria','$tipo_investigacion', '$campo_interes', '$nom_programas_educativos', '$nom_cuerpos_academicos', '$linea_investigacion_trabajo', '$nombre_instituciones_vinculadas', '$fecha_tentativa_inicio', '$duracion_proyecto', '$obj_general', '$obj_especificos', '$formacion_recursos', '$productividad_academica', '$productos_vinculacion', '$impacto', '$materiales_suministros', '$servicios_generales', '$total', '$firma_representante_tecnico', '$firma_jefe_dep_investigacion', '$sello_departamento_investigacion')";

//echo $query;

$insertar = mysqli_query($db, $query);

if($insertar){
echo "Insertado correctamente";
}

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

<main class="contenedor sombra container">

<h3>Favor de llenar todos los apartados</h3>

<?php foreach($errores as $error): ?>
                            <div class="alerta error">
                            <?php  echo $error; ?>
                            </div>
                        <?php endforeach; ?>

<form action="" method="POST" class="">

<div class="container">

<section class="formulario">
<div>
<label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha"
                            id="fecha" value="2021-05-15" min="2021-01-01" max="2025-05-15">
</div>
<div>
<label for="num_registro">Número de registro:</label><br>
        <input type="number" name="num_registro" id="num_registro" class="from" min="1" value="<?php echo $num_registro; ?>">
</div>
</section>
</div>

<section class="formulario container">
<legend>Representante técnico del proyecto</legend>
<div class="input-text grid">
<div>
        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre del reprentante técnico del proyecto" autocomplete="off">

          <label for="correo">Correo Electronico:</label>
          <input type="mail" name="correo" id="correo" value="<?php echo $correo; ?>" placeholder="Correo electronico del representante" autocomplete="off">
        </div>

        <div>
            <label for="titulo_proyecto">Título del proyecto</label>
            <input type="text" name="titulo_proyecto" id="titulo_proyecto" value="<?php echo $titulo_proyecto; ?>" autocomplete="off">
        </div>
</div>
<div>
        <div>
            <label for="nombre_convocatoria">Nombre de la convocatoria</label>
            <input type="text" name="nombre_convocatoria" id="nombre_convocatoria" value="<?php echo $nombre_convocatoria; ?>" autocomplete="off">
        </div>

        <div>
            <label for="inst_emite_convocatoria">Institución que emite la convocatoria:</label>
            <input type="text" name="inst_emite_convocatoria" id="inst_emite_convocatoria" value="<?php echo $inst_emite_convocatoria; ?>" autocomplete="off">
        </div>
</div>
</div>
</section>

<section class="formulario container">
<div class="grid">
<div class=>
<legend>Tipo de investigación</legend>
<center>
            <select name="tipo_investigacion" id="tipo_investigacion">
                <option disabled selected>--Tipo de investigación--</option>
                <?php while($row = mysqli_fetch_assoc($consulta_tipo_investigacion) ): ?>
                                        <option <?php echo $tipo_investigacion === $row['idtipo_investigacion'] ? 'selected' : ''; ?> value="<?php echo $row['idtipo_investigacion'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
            
            </select>
            </center>
</div>
<div>
                    <legend>Campo de interés:</legend>
    <center>                
            <select name="campo_interes" id="campo_interes">
                <option value="" disabled selected>--Campo de interes--</option>
                <?php while($row = mysqli_fetch_assoc($consulta_campo_interes) ): ?>
                <option  <?php echo $campo_interes === $row['idcampo_interes'] ? 'selected' : ''; ?> value=" <?php echo $row['idcampo_interes'] ?> "> <?php echo $row['dato']; ?> </option>
            
            <?php endwhile; ?>
            </select>   
            </center>   

</div>
</section>

<section class="formulario container">
<div class="input-text grid">
    <div>
                    <div>
                    <label for="nom_programas_educativos">Nombre del o de los programa&#40;s&#41; educativo&#40;s&#41; donde se realiza el proyecto:</label>
                    <input type="text" name="nom_programas_educativos" id="nom_programas_educativos" value="<?php echo $nom_programas_educativos; ?>" autocomplete="off">
                    </div>
                    <div>
                        <label for="nom_cuerpos_academicos">Nombre del/de los&#41; Cuerpo&#40;s&#41; Académico&#40;s&#41; participante&#40;s&#41; en el proyecto:</label>
                        <input type="text" name="nom_cuerpos_academicos" id="nom_cuerpos_academicos" value="<?php echo $nom_cuerpos_academicos; ?>" autocomplete="off">
                    </div>
                    <div>
                        <label for="linea_investigacion_trabajo">Linea de investigación o trabajo:</label>
                        <input type="text"  name="linea_investigacion_trabajo" id="linea_investigacion_trabajo" value="<?php echo $linea_investigacion_trabajo; ?>" autocomplete="off">
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
                            <input type="text" name="nombre_instituciones_vinculadas" id="nombre_instituciones_vinculadas" value="<?php echo $nombre_instituciones_vinculadas; ?>" autocomplete="off">
                        </div>
                    
                </div>
                </div>

</section>

<section class="formulario container">
<div class="input-text grid">
                        <div>
                            <label for="fecha">Fecha tentativa de inicio del proyecto:</label>
                            <input type="date" name="fecha_tentativa_inicio"
                            id="fecha_tentativa_inicio" value="2021-05-15" min="2021-01-01" max="2025-05-15">
                        </div>
                        <div>
                            <label for="">Duración del proyecto:</label>
                            <input type="text" name="duracion_proyecto" id="duracion_proyecto" value="<?php echo $duracion_proyecto; ?>" autocomplete="off">
                        </div>
                    </div>
</section>

<section class="formulario container">
<div class="grid">
<div>
                    <center>
                    <legend>Objetivo General del proyecto</legend>
                    <textarea name="obj_general" id="obj_general" cols="40" rows="10"></textarea>
                    </center>                
</div>
<div>
                    <center>
                    <legend>Objetivos Específicos del proyecto</legend>
                    <textarea name="obj_especificos" id="obj_especificos" cols="40" rows="10"></textarea>
                    </center>
</div>
</div>

</section>

<section class="formulario container"> 
<legend>Investigadores &#40;as&#41; Participantes</legend>

<div class="grid4">
       
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

<section class="formulario container">
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

<section class="formulario container">
    <legend>Productos entregables</legend>
    <div class="grid">
                    <div>
                    <legend>Fromación de Recursos Humanos</legend>
                    <center>
                    <select name="formacion_recursos" id="formacion_recursos">
                                    <option disabled selected>--Formación de Recursos Humanos--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_formacion) ): ?>
                                        <option <?php echo $formacion === $row['idformacion_recursos_humanos'] ? 'selected' : ''; ?> value="<?php echo $row['idformacion_recursos_humanos'] ?>"> <?php echo $row['dato']; ?> </option>
                                        
                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros</label><br>
                                <label for="especifique">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique">
                    </div>
                    </center>
                    <div>
                    <legend>Productividad académica</legend>
                    <center>
                    <select name="productividad_academica" id="productividad_academica">
                                    <option disabled selected >--Productividad académica--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_productividad) ): ?>
                                        <option <?php echo $productividad_academica === $row['idproductos_entregables'] ? 'selected' : ''; ?> value="<?php echo $row['idproductos_entregables'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros</label><br>
                                <label for="especifique2">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique2">
                                 </div>
                                 </center>

                                
                                 <div>
                                <legend>Productos en vinculación o extensión</legend>
                                <center> 
                                <select name="productos_vinculacion" id="productos_vinculacion">
                                    <option disabled selected >--Productos en vinculación o extensión--</option>
                                    <?php while($row = mysqli_fetch_assoc($consulta_productos) ): ?>
                                        <option <?php echo  $productos_vinculacion === $row['idproductos_vinculacion'] ? 'selected' : ''; ?> value="<?php echo $row['idproductos_vinculacion'] ?>"> <?php echo $row['dato']; ?> </option>

                                    <?php endwhile; ?>
                                </select><br>
                                <input type="checkbox" name="productos" id="beneficios" value="beneficios">
                                <label for="beneficios">Otros beneficios </label><br>
                                <label for="especifique3">Especifique:</label><br>
                                <input type="text" name="productos" id="espcifique3">
                                 </div>
                                 </center>
                                 
     </div>     
</section>

<section class="formulario container">
<div>
                    <legend>Impacto</legend>
                   <center> <textarea name="impacto" id="impacto" cols="50" rows="10"></textarea></center>
                </div>
</section>

<section class="formulario container">
<legend>Presupuesto</legend>
<div class="formulario grid2">
                <div>
                    <legend>Concepto</legend></br>
                    <label for="materiales">Materiales y Suministro</label></br>
                    <label for="servicios">Servicios Generales</label></br>
                    <label>Total</label>
                </div>

                <div>
                    <legend>Monto solicitado</legend></br>
                    <input type="text" name="materiales_suministros" id="materiales_suministros" value="<?php echo $materiales_suministros; ?>" autocomplete="off"></br>
                    <input type="text" name="servicios_generales" id="servicios_generales" value="<?php echo $servicios_generales; ?>" autocomplete="off"></br>
                    <input type="text" name="total" name="total" value="<?php echo $total; ?>" autocomplete="off"></br>
                </div>
            </div>
</section>

<section class="formulario container">
<div class="grid3">
    <center>
                <div>
                    <textarea name="firma_representante_tecnico" id="firma_representante_tecnico" cols="25" rows="10" ></textarea>
                    <legend>Representante Técnico</legend>
                </div>
                </center>
                <center>
                <div>
                    <textarea name="firma_jefe_dep_investigacion" id="firma_jefe_dep_investigacion" cols="25" rows="10"></textarea>
                        <legend>Jefatura de Departamento de investigación y Desarrollo Tecnológico</legend>
                </div>
                </center>
                <center>
                <div>
                    <textarea name="sello_departamento_investigacion" id="sello_departamento_investigacion" cols="25" rows="10"></textarea>
                     <legend>Sello del Departamento de Investigación y Desarrollo Tecnológico</legend>
                </div>
                </center>
                
            </div>
            <div>
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