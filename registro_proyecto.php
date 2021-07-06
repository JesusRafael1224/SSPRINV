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
$formacion_recursos = '';
$tipo_investigacion = null;
$campo_interes = null;
$nom_programas_educativos = '';
$nom_cuerpos_academicos = '';
$linea_investigacion_trabajo = '';
$nombre_instituciones_vinculadas = '';
$fecha_tentativa_inicio = '';
$duracion_proyecto = '';
$obj_general = '';
$obj_especificos = '';
$formacion_recursos = null;
$formacion_recursos2 = '';
$productividad_academica = null;
$productividad_academica2 = '';
$productos_vinculacion = null;
$productos_vinculacion2 = '';
$impacto = '';
$materiales_suministros = '';
$servicios_generales = '';
$total = '';
$firma_representante_tecnico = '';
$firma_jefe_dep_investigacion = '';
$sello_departamento_investigacion = '';
//INVESTIGADORES PARTICIPANTES
$nombre_inves_participante1 = '';
$nombre_inves_participante2 = '';
$nombre_inves_participante3 = '';
$nombre_inves_participante4 = '';
$adscripcion_inves_participante1 = '';
$adscripcion_inves_participante2 = '';
$adscripcion_inves_participante3 = '';
$adscripcion_inves_participante4 = '';
$tipo_participacion1 = '';
$tipo_participacion2 = '';
$tipo_participacion3 = '';
$tipo_participacion4 = '';
$ruta_firma1 = '';
$ruta_firma2 = '';
$ruta_firma3 = '';
$ruta_firma4 = '';
//ESTUDINATES PARTICIPANTES
$nombre_estudiante1 = '';
$nombre_estudiante2 = '';
$nombre_estudiante3 = '';
$nombre_estudiante4 = '';
$carrera_estudiante1 = '';
$carrera_estudiante2 = '';
$carrera_estudiante3 = '';
$carrera_estudiante4 = '';
$promedio_estudiante1 = '';
$promedio_estudiante2 = '';
$promedio_estudiante3 = '';
$promedio_estudiante4 = '';
$matricula_estudiante1 = '';
$matricula_estudiante2 = '';
$matricula_estudiante3 = '';
$matricula_estudiante4 = '';
$semestre_estudiante1 = '';
$semestre_estudiante2 = '';
$semestre_estudiante3 = '';
$semestre_estudiante4 = '';
$curp_estudiante1 = '';
$curp_estudiante2 = '';
$curp_estudiante3 = '';
$curp_estudiante4 = '';
$rfc_estudiante1 = '';
$rfc_estudiante2 = '';
$rfc_estudiante3 = '';
$rfc_estudiante4 = '';
$correo_estudiante1 = '';
$correo_estudiante2 = '';
$correo_estudiante3 = '';
$correo_estudiante4 = '';
$telefono_estudiante1 = '';
$telefono_estudiante2 = '';
$telefono_estudiante3 = '';
$telefono_estudiante4 = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $fecha = mysqli_real_escape_string($db, filter_var($_POST['fecha'], FILTER_SANITIZE_STRING));
    $num_registro = mysqli_real_escape_string($db, filter_var($_POST['num_registro'], FILTER_SANITIZE_NUMBER_INT));
    $nombre = mysqli_real_escape_string($db, filter_var($_POST['nombre'], FILTER_SANITIZE_STRING));
    $correo = mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL));
    $titulo_proyecto = mysqli_real_escape_string($db, filter_var($_POST['titulo_proyecto'], FILTER_SANITIZE_STRING));
    $nombre_convocatoria = mysqli_real_escape_string($db, filter_var($_POST['nombre_convocatoria'], FILTER_SANITIZE_STRING));
    $inst_emite_convocatoria = mysqli_real_escape_string($db, filter_var($_POST['inst_emite_convocatoria'], FILTER_SANITIZE_STRING));
    $tipo_investigacion = mysqli_real_escape_string($db, filter_var($_POST['tipo_investigacion'] ?? '', FILTER_SANITIZE_STRING));
    $campo_interes = mysqli_real_escape_string($db, filter_var($_POST['campo_interes'] ?? '', FILTER_SANITIZE_STRING));
    $nom_programas_educativos = mysqli_real_escape_string($db, filter_var($_POST['nom_programas_educativos'], FILTER_SANITIZE_STRING));
    $nom_cuerpos_academicos = mysqli_real_escape_string($db, filter_var($_POST['nom_cuerpos_academicos'], FILTER_SANITIZE_STRING));
    $linea_investigacion_trabajo = mysqli_real_escape_string($db, filter_var($_POST['linea_investigacion_trabajo'], FILTER_SANITIZE_STRING));
    $nombre_instituciones_vinculadas = mysqli_real_escape_string($db, filter_var($_POST['nombre_instituciones_vinculadas'], FILTER_SANITIZE_STRING));
    $fecha_tentativa_inicio = mysqli_real_escape_string($db, filter_var($_POST['fecha_tentativa_inicio'], FILTER_SANITIZE_STRING));
    $duracion_proyecto = mysqli_real_escape_string($db, filter_var($_POST['duracion_proyecto'], FILTER_SANITIZE_STRING));
    $obj_general = mysqli_real_escape_string($db, filter_var($_POST['obj_general'], FILTER_SANITIZE_STRING));
    $obj_especificos = mysqli_real_escape_string($db, filter_var($_POST['obj_especificos'], FILTER_SANITIZE_STRING));
    $formacion_recursos = mysqli_real_escape_string($db, filter_var($_POST['formacion_recursos'] ?? '', FILTER_SANITIZE_STRING));
    $formacion_recursos2 = mysqli_real_escape_string($db, filter_var($_POST['formacion_recursos2'], FILTER_SANITIZE_STRING));
    $productividad_academica = mysqli_real_escape_string($db, filter_var($_POST['productividad_academica'] ?? '', FILTER_SANITIZE_STRING));
    $productividad_academica2 = mysqli_real_escape_string($db, filter_var($_POST['productividad_academica2'], FILTER_SANITIZE_STRING));
    $productos_vinculacion = mysqli_real_escape_string($db, filter_var($_POST['productos_vinculacion'] ?? '', FILTER_SANITIZE_STRING));
    $productos_vinculacion2 = mysqli_real_escape_string($db, filter_var($_POST['productos_vinculacion2'], FILTER_SANITIZE_STRING));
    $impacto = mysqli_real_escape_string($db, filter_var($_POST['impacto'], FILTER_SANITIZE_STRING));
    $materiales_suministros = mysqli_real_escape_string($db, filter_var($_POST['materiales_suministros'], FILTER_SANITIZE_NUMBER_INT));
    $servicios_generales = mysqli_real_escape_string($db, filter_var($_POST['servicios_generales'], FILTER_SANITIZE_NUMBER_INT));
    $total = mysqli_real_escape_string($db, filter_var($_POST['total'], FILTER_SANITIZE_NUMBER_INT));
    $firma_representante_tecnico = mysqli_real_escape_string($db, filter_var($_POST['firma_representante_tecnico'], FILTER_SANITIZE_STRING));
    $firma_jefe_dep_investigacion = mysqli_real_escape_string($db, filter_var($_POST['firma_jefe_dep_investigacion'], FILTER_SANITIZE_STRING));
    $sello_departamento_investigacion = mysqli_real_escape_string($db, filter_var($_POST['sello_departamento_investigacion'], FILTER_SANITIZE_STRING));
    //INVESTIGADORES PARTICIPANTES
    $nombre_inves_participante1 = mysqli_real_escape_string($db, filter_var($_POST['nombre_inves_participante1'], FILTER_SANITIZE_STRING));
    $nombre_inves_participante2 = mysqli_real_escape_string($db, filter_var($_POST['nombre_inves_participante2'], FILTER_SANITIZE_STRING));
    $nombre_inves_participante3 = mysqli_real_escape_string($db, filter_var($_POST['nombre_inves_participante3'], FILTER_SANITIZE_STRING));
    $nombre_inves_participante4 = mysqli_real_escape_string($db, filter_var($_POST['nombre_inves_participante4'], FILTER_SANITIZE_STRING));
    $adscripcion_inves_participante1 = mysqli_real_escape_string($db, filter_var($_POST['adscripcion_inves_participante1'], FILTER_SANITIZE_STRING));
    $adscripcion_inves_participante2 = mysqli_real_escape_string($db, filter_var($_POST['adscripcion_inves_participante2'], FILTER_SANITIZE_STRING));
    $adscripcion_inves_participante3 = mysqli_real_escape_string($db, filter_var($_POST['adscripcion_inves_participante3'], FILTER_SANITIZE_STRING));
    $adscripcion_inves_participante4 = mysqli_real_escape_string($db, filter_var($_POST['adscripcion_inves_participante4'], FILTER_SANITIZE_STRING));
    $tipo_participacion1 = mysqli_real_escape_string($db, filter_var($_POST['tipo_participacion1'], FILTER_SANITIZE_STRING));
    $tipo_participacion2 = mysqli_real_escape_string($db, filter_var($_POST['tipo_participacion2'], FILTER_SANITIZE_STRING));
    $tipo_participacion3 = mysqli_real_escape_string($db, filter_var($_POST['tipo_participacion3'], FILTER_SANITIZE_STRING));
    $tipo_participacion4 = mysqli_real_escape_string($db, filter_var($_POST['tipo_participacion4'], FILTER_SANITIZE_STRING));
    $ruta_firma1 = mysqli_real_escape_string($db, filter_var($_POST['ruta_firma1'], FILTER_SANITIZE_STRING));
    $ruta_firma2 = mysqli_real_escape_string($db, filter_var($_POST['ruta_firma2'], FILTER_SANITIZE_STRING));
    $ruta_firma3 = mysqli_real_escape_string($db, filter_var($_POST['ruta_firma3'], FILTER_SANITIZE_STRING));
    $ruta_firma4 = mysqli_real_escape_string($db, filter_var($_POST['ruta_firma4'], FILTER_SANITIZE_STRING));
    //ESTUDIANTES PARTICIPANTES
    $nombre_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['nombre_estudiante1'], FILTER_SANITIZE_STRING));
    $nombre_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['nombre_estudiante2'], FILTER_SANITIZE_STRING));
    $nombre_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['nombre_estudiante3'], FILTER_SANITIZE_STRING));
    $nombre_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['nombre_estudiante4'], FILTER_SANITIZE_STRING));
    $carrera_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['carrera_estudiante1'], FILTER_SANITIZE_STRING));
    $carrera_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['carrera_estudiante2'], FILTER_SANITIZE_STRING));
    $carrera_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['carrera_estudiante3'], FILTER_SANITIZE_STRING));
    $carrera_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['carrera_estudiante4'], FILTER_SANITIZE_STRING));
    $promedio_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['promedio_estudiante1'], FILTER_SANITIZE_STRING));
    $promedio_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['promedio_estudiante2'], FILTER_SANITIZE_STRING));
    $promedio_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['promedio_estudiante3'], FILTER_SANITIZE_STRING));
    $promedio_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['promedio_estudiante4'], FILTER_SANITIZE_STRING));
    $matricula_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['matricula_estudiante1'], FILTER_SANITIZE_STRING));
    $matricula_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['matricula_estudiante2'], FILTER_SANITIZE_STRING));
    $matricula_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['matricula_estudiante3'], FILTER_SANITIZE_STRING));
    $matricula_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['matricula_estudiante4'], FILTER_SANITIZE_STRING));
    $semestre_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['semestre_estudiante1'], FILTER_SANITIZE_STRING));
    $semestre_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['semestre_estudiante2'], FILTER_SANITIZE_STRING));
    $semestre_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['semestre_estudiante3'], FILTER_SANITIZE_STRING));
    $semestre_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['semestre_estudiante4'], FILTER_SANITIZE_STRING));
    $curp_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['curp_estudiante1'], FILTER_SANITIZE_STRING));
    $curp_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['curp_estudiante2'], FILTER_SANITIZE_STRING));
    $curp_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['curp_estudiante3'], FILTER_SANITIZE_STRING));
    $curp_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['curp_estudiante4'], FILTER_SANITIZE_STRING));
    $rfc_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['rfc_estudiante1'], FILTER_SANITIZE_STRING));
    $rfc_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['rfc_estudiante1'], FILTER_SANITIZE_STRING));
    $rfc_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['rfc_estudiante1'], FILTER_SANITIZE_STRING));
    $rfc_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['rfc_estudiante1'], FILTER_SANITIZE_STRING));
    $correo_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['correo_estudiante1'], FILTER_SANITIZE_STRING));
    $correo_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['correo_estudiante2'], FILTER_SANITIZE_STRING));
    $correo_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['correo_estudiante3'], FILTER_SANITIZE_STRING));
    $correo_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['correo_estudiante4'], FILTER_SANITIZE_STRING));
    $telefono_estudiante1 = mysqli_real_escape_string($db, filter_var($_POST['telefono_estudiante1'], FILTER_SANITIZE_STRING));
    $telefono_estudiante2 = mysqli_real_escape_string($db, filter_var($_POST['telefono_estudiante2'], FILTER_SANITIZE_STRING));
    $telefono_estudiante3 = mysqli_real_escape_string($db, filter_var($_POST['telefono_estudiante3'], FILTER_SANITIZE_STRING));
    $telefono_estudiante4 = mysqli_real_escape_string($db, filter_var($_POST['telefono_estudiante4'], FILTER_SANITIZE_STRING));

    // if(!$fecha && !$num_registro && !$nombre && !$correo && !$titulo_proyecto && !$nombre_convocatoria && !$inst_emite_convocatoria && !$tipo_investigacion && !$campo_interes && !$nom_programas_educativos && !$nom_cuerpos_academicos && !$linea_investigacion_trabajo && !$nombre_instituciones_vinculadas && !$fecha_tentativa_inicio && !$duracion_proyecto && !$obj_general && !$obj_especificos && !$formacion_recursos && !$productividad_academica && !$productos_vinculacion && !$impacto && !$materiales_suministros && !$servicios_generales && !$total && !$firma_representante_tecnico && !$firma_jefe_dep_investigacion && !$sello_departamento_investigacion){
    //  $errores[] = "Todos los campos son obligatorios";
    //}

    if (!$fecha) {
        $errores[] = "Fecha";
    }
    if (!$num_registro) {
        $errores[] = "Numero de registro";
    }
    if (!$nombre) {
        $errores[] = "Nombre del representante tecnico del proyecto";
    }
    if (!$correo) {
        $errores[] = "Correo del representante tecnico del proyecto";
    }
    if (!$titulo_proyecto) {
        $errores[] = "Titulo del proyecto";
    }
    if (!$nombre_convocatoria) {
        $errores[] = "Nombre de la convocatoria";
    }
    if (!$inst_emite_convocatoria) {
        $errores[] = "Institución que emite la convocatoria";
    }
    if (!$tipo_investigacion) {
        $errores[] = "Tipo de investigación";
    }
    if (!$campo_interes) {
        $errores[] = "Campo de interés";
    }
    if (!$nom_programas_educativos) {
        $errores[] = "Nombre del o de los programa(s) educativos ";
    }
    if (!$nom_cuerpos_academicos) {
        $errores[] = "Nombre del/de los) cuerpos Académico(s)";
    }
    if (!$linea_investigacion_trabajo) {
        $errores[] = "Linea de investigación o trabajo";
    }
    // if(!$nombre_instituciones_vinculadas){
    //     $errores[] = "Nombre de las instituciones externas vinculadas";
    // }
    if (!$fecha_tentativa_inicio) {
        $errores[] = "Fecha tentativa de inicio del proyecto";
    }
    if (!$duracion_proyecto) {
        $errores[] = "duración del proyecto";
    }
    if (!$obj_general) {
        $errores[] = "Objetivo general del proyecto";
    }
    if (!$obj_especificos) {
        $errores[] = "Objetivos específicos";
    }
    // if (!$formacion_recursos) {
    //     $errores[] = "Formación de recursos humanos";
    // }
    // if (!$productividad_academica) {
    //     $errores[] = "Productividad académica";
    // }
    // if (!$productos_vinculacion) {
    //     $errores[] = "Productos en vinculación o extensión";
    // }
    if (!$impacto) {
        $errores[] = "Impacto";
    }
    if (!$materiales_suministros) {
        $errores[] = "Materiales y suministros";
    }
    if (!$servicios_generales) {
        $errores[] = "Servicios generales";
    }
    if (!$total) {
        $errores[] = "Total";
    }
    if (!$firma_representante_tecnico) {
        $errores[] = "Representante tecnico";
    }
    if (!$firma_jefe_dep_investigacion) {
        $errores[] = "Jefatura del departamento de investigación";
    }
    if (!$sello_departamento_investigacion) {
        $errores[] = "Sello del departamento de investigación";
    }

    //$query = "call `new_proyecto`('$fecha', '$num_registro')";

    if (empty($errores)) {

        $query = "INSERT INTO registro_proyecto (fecha, num_registro, nombre, correo, titulo_proyecto, nombre_convocatoria, inst_emite_convocatoria, tipo_investigacion, campo_interes, nom_programas_educativos, nom_cuerpos_academicos, linea_investigacion_trabajo, nombre_instituciones_vinculadas, fecha_tentativa_inicio, duracion_proyecto, obj_general, obj_especificos, formacion_recursos, productividad_academica, productos_vinculacion, impacto, materiales_suministros, servicios_generales, total, firma_representante_tecnico, firma_jefe_dep_investigacion, sello_departamento_investigacion) VALUES ('$fecha', '$num_registro', '$nombre', '$correo', '$titulo_proyecto', '$nombre_convocatoria', '$inst_emite_convocatoria','$tipo_investigacion', '$campo_interes', '$nom_programas_educativos', '$nom_cuerpos_academicos', '$linea_investigacion_trabajo', '$nombre_instituciones_vinculadas', '$fecha_tentativa_inicio', '$duracion_proyecto', '$obj_general', '$obj_especificos', '$formacion_recursos $formacion_recursos2', '$productividad_academica $productividad_academica2', '$productos_vinculacion $productos_vinculacion2', '$impacto', '$materiales_suministros', '$servicios_generales', '$total', '$firma_representante_tecnico', '$firma_jefe_dep_investigacion', '$sello_departamento_investigacion')";

        $insertar = mysqli_query($db, $query);

        $query2 = "INSERT INTO investigadores_participantes (nombre_inves_participante, adscripcion_institucion, tipo_participacion, ruta_firma) values ('$nombre_inves_participante1', '$adscripcion_inves_participante1', '$tipo_participacion1', '$ruta_firma1'), ('$nombre_inves_participante2', '$adscripcion_inves_participante2', '$tipo_participacion2', '$ruta_firma2'),
         ('$nombre_inves_participante3', '$adscripcion_inves_participante3', '$tipo_participacion3', '$ruta_firma3'),
         ('$nombre_inves_participante4', '$adscripcion_inves_participante4', '$tipo_participacion4', '$ruta_firma4')";

        $insertar2 = mysqli_query($db, $query2);

        $query3 = "INSERT INTO estudiantes_participantes (nombre_estudiante, carrera_estudiante, promedio_estudiante, matricula_estudiante, semestre_estudiante, curp_estudiante, rfc_estudiante, correo_estudiante, telefono_estudiante) VALUES ('$nombre_estudiante1', '$carrera_estudiante1', '$promedio_estudiante1', '$matricula_estudiante1', '$semestre_estudiante1', '$curp_estudiante1', '$rfc_estudiante1', '$correo_estudiante1', '$telefono_estudiante1'), ('$nombre_estudiante2', '$carrera_estudiante2', '$promedio_estudiante2', '$matricula_estudiante2', '$semestre_estudiante2', '$curp_estudiante2', '$rfc_estudiante2', '$correo_estudiante2', '$telefono_estudiante2'), ('$nombre_estudiante3', '$carrera_estudiante3', '$promedio_estudiante3', '$matricula_estudiante3', '$semestre_estudiante3', '$curp_estudiante3', '$rfc_estudiante3', '$correo_estudiante3', '$telefono_estudiante3'), ('$nombre_estudiante4', '$carrera_estudiante4', '$promedio_estudiante4', '$matricula_estudiante4', '$semestre_estudiante4', '$curp_estudiante4', '$rfc_estudiante4', '$correo_estudiante4', '$telefono_estudiante4')";

        $insertar3 = mysqli_query($db, $query3);
        //echo $query;



        if ($insertar && $insertar2 || $insertar3) {
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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="librerias/jspdf.min.js"></script>
    <script src="librerias/jspdf.plugin.autotable.min.js"></script>
    <link rel="preload" href="/css/normalize.css" as="style" />
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
        <h2 id="htitulo">Nuevo proyecto</h2>
    </header>

    <main class="contenedor sombra container">

        <h3>Favor de llenar todos los apartados</h3>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="" method="POST" class="">

            <div class="container">

                <section class="formulario">
                    <div class="grid3">
                        <div>
                            <label for="fecha">Fecha:</label><br>
                            <input class="input-text" type="date" name="fecha" id="fecha" value="2021-05-15" min="2021-01-01" max="2025-05-15">
                        </div>
                        <div>
                            <label for="num_registro">Número de registro:</label><br>
                            <input type="number" name="num_registro" id="num_registro" class="input-text" min="1" value="<?php echo $num_registro; ?>">
                        </div>
                    </div>
                </section>
            </div>

            <section class="formulario container">
                <legend>Representante Técnico del proyecto</legend>
                <div class="input-text grid">
                    <div>
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre del reprentante técnico del proyecto" autocomplete="off">

                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" name="correo" id="correo" value="<?php echo $correo; ?>" placeholder="Correo electrónico del representante" autocomplete="off">
                        </div>

                        <div>
                            <label for="titulo_proyecto">Título del proyecto:</label>
                            <input type="text" name="titulo_proyecto" id="titulo_proyecto" value="<?php echo $titulo_proyecto; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="nombre_convocatoria">Nombre de la Convocatoria:</label>
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
                        <legend>Tipo de investigación:</legend>
                        <center>
                            <select name="tipo_investigacion" id="tipo_investigacion" class="input-text">
                                <option disabled selected>--Tipo de investigación--</option>
                                <?php while ($row = mysqli_fetch_assoc($consulta_tipo_investigacion)) : ?>
                                    <option <?php echo $tipo_investigacion === $row['idtipo_investigacion'] ? 'selected' : ''; ?> value="<?php echo $row['dato'] ?> <?php echo $tipo_investigacion; ?>"> <?php echo $row['dato']; ?> </option>

                                <?php endwhile; ?>

                            </select>
                        </center>
                    </div>
                    <div>
                        <legend>Campo de interés:</legend>
                        <center>
                            <select name="campo_interes" id="campo_interes" class="input-text">
                                <option disabled selected>--Campo de interes--</option>
                                <?php while ($row = mysqli_fetch_assoc($consulta_campo_interes)) : ?>
                                    <option <?php echo $campo_interes === $row['idcampo_interes'] ? 'selected' : ''; ?> value=" <?php echo $row['dato'] ?> <?php echo $campo_interes; ?>"> <?php echo $row['dato']; ?> </option>

                                <?php endwhile; ?>
                            </select>
                        </center>

                    </div>
            </section>

            <section class="formulario container">
                <div class="input-text grid">
                    <div>
                        <div>
                            <label for="nom_programas_educativos">Nombre del o de los programa&#40;s&#41; educativo&#40;s&#41; donde se realizara el proyecto:</label>
                            <input type="text" name="nom_programas_educativos" id="nom_programas_educativos" value="<?php echo $nom_programas_educativos; ?>" autocomplete="off">
                        </div>
                        <div>
                            <label for="nom_cuerpos_academicos">Nombre del/de los&#41; Cuerpo&#40;s&#41; Académico&#40;s&#41; participante&#40;s&#41; en el proyecto:</label>
                            <input type="text" name="nom_cuerpos_academicos" id="nom_cuerpos_academicos" value="<?php echo $nom_cuerpos_academicos; ?>" autocomplete="off">
                        </div>
                        <div>
                            <label for="linea_investigacion_trabajo">Linea de investigación o trabajo:</label>
                            <input type="text" name="linea_investigacion_trabajo" id="linea_investigacion_trabajo" value="<?php echo $linea_investigacion_trabajo; ?>" autocomplete="off">
                        </div>
                    </div>

                    <div>
                        <div>
                            <label>¿Están vinculadas instituciones externas en el desarrollo del proyecto?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="opcionsi" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="opcionno">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div>
                            <label for="nombre_instituciones_vinculadas">Nombre de las instituciones Externas vinculadas:</label>
                            <input type="text" name="nombre_instituciones_vinculadas" id="nombre_instituciones_vinculadas" value="<?php echo $nombre_instituciones_vinculadas; ?>" autocomplete="off">
                        </div>

                    </div>

            </section>
            <script>
                var opcion = document.getElementById('nombre_instituciones_vinculadas');

                // evento para el input radio del "si"
                document.getElementById('opcionsi').addEventListener('click', function(e) {
                    //console.log('Vamos a habilitar el input text');
                    opcion.disabled = false;
                });

                // evento para el input radio del "no"
                document.getElementById('opcionno').addEventListener('click', function(e) {
                    //console.log('Vamos a deshabilitar el input text');
                    opcion.disabled = true;
                });
            </script>

            <section class="formulario container">
                <div class="input-text grid">
                    <div>
                        <label for="fecha">Fecha tentativa de inicio del proyecto:</label>
                        <input type="date" name="fecha_tentativa_inicio" id="fecha_tentativa_inicio" value="2021-05-15" min="2021-01-01" max="2025-05-15">
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
                            <legend>Objetivos Específicos</legend>
                            <textarea name="obj_especificos" id="obj_especificos" cols="40" rows="10"></textarea>
                        </center>
                    </div>
                </div>

            </section>

            <section class="formulario container">
                <legend>Investigadores &#40;as&#41; Participantes</legend>

                <div class="grid4 input-text">

                    <div>
                        <label>Nombre</label><br>
                        <input type="text" name="nombre_inves_participante1" id="nombre_inves_participante1" value="<?php echo $nombre_inves_participante1; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_inves_participante2" id="nombre_inves_participante2" value="<?php echo $nombre_inves_participante2; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_inves_participante3" id="nombre_inves_participante3" value="<?php echo $nombre_inves_participante3; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_inves_participante4" id="nombre_inves_participante4" value="<?php echo $nombre_inves_participante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Adcripción/Institución</label><br>
                        <input type="text" name="adscripcion_inves_participante1" id="adscripcion_inves_participante1" value="<?php echo $adscripcion_inves_participante1; ?>" autocomplete="off"><br>
                        <input type="text" name="adscripcion_inves_participante2" id="adscripcion_inves_participante2" value="<?php echo $adscripcion_inves_participante2; ?>" autocomplete="off"><br>
                        <input type="text" name="adscripcion_inves_participante3" id="adscripcion_inves_participante3" value="<?php echo $adscripcion_inves_participante3; ?>" autocomplete="off"><br>
                        <input type="text" name="adscripcion_inves_participante4" id="adscripcion_inves_participante4" value="<?php echo $adscripcion_inves_participante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Tipo de participación</label><br>
                        <input type="text" name="tipo_participacion1" id="tipo_participacion1" value="<?php echo $tipo_participacion1; ?>" autocomplete="off"><br>
                        <input type="text" name="tipo_participacion2" id="tipo_participacion2" value="<?php echo $tipo_participacion2; ?>" autocomplete="off"><br>
                        <input type="text" name="tipo_participacion3" id="tipo_participacion3" value="<?php echo $tipo_participacion3; ?>" autocomplete="off"><br>
                        <input type="text" name="tipo_participacion4" id="tipo_participacion4" value="<?php echo $tipo_participacion4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Firma</label><br>
                        <input type="text" name="ruta_firma1" id="ruta_firma1" value="<?php echo $ruta_firma1; ?>" autocomplete="off"><br>
                        <input type="text" name="ruta_firma2" id="ruta_firma2" value="<?php echo $ruta_firma2; ?>" autocomplete="off"><br>
                        <input type="text" name="ruta_firma3" id="ruta_firma3" value="<?php echo $ruta_firma3; ?>" autocomplete="off"><br>
                        <input type="text" name="ruta_firma4" id="ruta_firma4" value="<?php echo $ruta_firma4; ?>" autocomplete="off"><br>
                    </div>
                </div>

            </section>

            <section class="formulario container">
                <legend>Estudiantes participantes</legend>
                <div class="grid4 input-text">
                    <div>
                        <label>Nombre Completo</label><br>
                        <input type="text" name="nombre_estudiante1" id="nombre_estudiante1" value="<?php echo $nombre_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_estudiante2" id="nombre_estudiante2" value="<?php echo $nombre_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_estudiante3" id="nombre_estudiante3" value="<?php echo $nombre_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="nombre_estudiante4" id="nombre_estudiante4" value="<?php echo $nombre_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Carrera</label><br>
                        <input type="text" name="carrera_estudiante1" id="carrera_estudiante1" value="<?php echo $carrera_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="carrera_estudiante2" id="carrera_estudiante2" value="<?php echo $carrera_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="carrera_estudiante3" id="carrera_estudiante3" value="<?php echo $carrera_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="carrera_estudiante4" id="carrera_estudiante4" value="<?php echo $carrera_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Promedio</label><br>
                        <input type="text" name="promedio_estudiante1" id="promedio_estudiante1" value="<?php echo $promedio_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="promedio_estudiante2" id="promedio_estudiante2" value="<?php echo $promedio_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="promedio_estudiante3" id="promedio_estudiante3" value="<?php echo $promedio_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="promedio_estudiante4" id="promedio_estudiante4" value="<?php echo $promedio_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Matrícula</label><br>
                        <input type="text" name="matricula_estudiante1" id="matricula_estudiante1" value="<?php echo $matricula_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="matricula_estudiante2" id="matricula_estudiante2" value="<?php echo $matricula_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="matricula_estudiante3" id="matricula_estudiante3" value="<?php echo $matricula_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="matricula_estudiante4" id="matricula_estudiante4" value="<?php echo $matricula_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Semestre</label><br>
                        <input type="text" name="semestre_estudiante1" id="semestre_estudiante1" value="<?php echo $semestre_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="semestre_estudiante2" id="semestre_estudiante2" value="<?php echo $semestre_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="semestre_estudiante3" id="semestre_estudiante3" value="<?php echo $semestre_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="semestre_estudiante4" id="semestre_estudiante4" value="<?php echo $semestre_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>CURP</label><br>
                        <input type="text" name="curp_estudiante1" id="curp_estudiante1" value="<?php echo $curp_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="curp_estudiante2" id="curp_estudiante2" value="<?php echo $curp_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="curp_estudiante3" id="curp_estudiante3" value="<?php echo $curp_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="curp_estudiante4" id="curp_estudiante4" value="<?php echo $curp_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>RFC</label><br>
                        <input type="text" name="rfc_estudiante1" id="rfc_estudiante1" value="<?php echo $rfc_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="rfc_estudiante2" id="rfc_estudiante2" value="<?php echo $rfc_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="rfc_estudiante3" id="rfc_estudiante3" value="<?php echo $rfc_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="rfc_estudiante4" id="rfc_estudiante4" value="<?php echo $rfc_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Correo electrónico</label><br>
                        <input type="text" name="correo_estudiante1" id="correo_estudiante1" value="<?php echo $correo_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="correo_estudiante2" id="correo_estudiante2" value="<?php echo $correo_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="correo_estudiante3" id="correo_estudiante3" value="<?php echo $correo_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="correo_estudiante4" id="correo_estudiante4" value="<?php echo $correo_estudiante4; ?>" autocomplete="off"><br>
                    </div>

                    <div>
                        <label>Teléfono</label><br>
                        <input type="text" name="telefono_estudiante1" id="telefono_estudiante1" value="<?php echo $telefono_estudiante1; ?>" autocomplete="off"><br>
                        <input type="text" name="telefono_estudiante2" id="telefono_estudiante2" value="<?php echo $telefono_estudiante2; ?>" autocomplete="off"><br>
                        <input type="text" name="telefono_estudiante3" id="telefono_estudiante3" value="<?php echo $telefono_estudiante3; ?>" autocomplete="off"><br>
                        <input type="text" name="telefono_estudiante4" id="telefono_estudiante4" value="<?php echo $telefono_estudiante4; ?>" autocomplete="off"><br>
                    </div>
                </div>
            </section>

            <section class="formulario container">
                <legend>Productos entregables</legend>
                <div class="grid input-text">
                    <div>
                        <legend>Fromación de Recursos Humanos</legend>
                        <center>
                            <select name="formacion_recursos" id="formacion_recursos" class="input-text">
                                <option disabled selected>--Formación de Recursos Humanos--</option>
                                <?php while ($row = mysqli_fetch_assoc($consulta_formacion)) : ?>
                                    <option <?php echo $formacion_recursos === $row['idformacion_recursos_humanos'] ? 'selected' : ''; ?> value="<?php echo $row['dato'] ?> <?php echo $formacion_recursos; ?>"> <?php echo $row['dato']; ?> </option>

                                <?php endwhile; ?>
                            </select><br>
                            <!-- <input type="checkbox" name="productos" id="beneficios" value="beneficios"> -->
                            <label>Otros</label><br>
                            <label>Especifique:</label><br>
                            <input type="text" name="formacion_recursos2" id="formacion_recursos2">
                    </div>
                    </center>
                    <div>
                        <legend>Productividad académica</legend>
                        <center>
                            <select name="productividad_academica" id="productividad_academica" class="input-text">
                                <option disabled selected>--Productividad académica--</option>
                                <?php while ($row = mysqli_fetch_assoc($consulta_productividad)) : ?>
                                    <option <?php echo $productividad_academica === $row['idproductos_entregables'] ? 'selected' : ''; ?> value="<?php echo $row['dato'] ?>" <?php echo $productividad_academica; ?>> <?php echo $row['dato']; ?> </option>

                                <?php endwhile; ?>
                            </select><br>
                            <!-- <input type="checkbox" name="productos" id="beneficios" value="beneficios"> -->
                            <label>Otros</label><br>
                            <label>Especifique:</label><br>
                            <input type="text" name="productividad_academica2" id="productividad_academica2">
                    </div>
                    </center>


                    <div>
                        <legend>Productos en vinculación o extensión</legend>
                        <center>
                            <select name="productos_vinculacion" id="productos_vinculacion" class="input-text">
                                <option disabled selected>--Productos en vinculación o extensión--</option>
                                <?php while ($row = mysqli_fetch_assoc($consulta_productos)) : ?>
                                    <option <?php echo  $productos_vinculacion === $row['idproductos_vinculacion'] ? 'selected' : ''; ?> value="<?php echo $row['dato'] ?> <?php echo $productos_vinculacion; ?>"> <?php echo $row['dato']; ?> </option>

                                <?php endwhile; ?>
                            </select><br>
                            <!-- <input type="checkbox" name="productos" id="beneficios" value="beneficios"> -->
                            <label>Otros beneficios </label><br>
                            <label>Especifique:</label><br>
                            <input type="text" name="productos_vinculacion2" id="productos_vinculacion2">
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
                <div class="formulario ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Concepto</th>
                                <th scope="col">Monto solicitado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td scope="row">Materiales y Suministros</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input class="form-control" type="number" min="1" name="materiales_suministros" id="materiales_suministros" value="<?php echo $materiales_suministros; ?>" autocomplete="off">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Servicios Generales</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input class="form-control" type="number" min="1" name="servicios_generales" id="servicios_generales" value="<?php echo $servicios_generales; ?>" autocomplete="off">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Total</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input class="form-control" type="number" min="1" name="total" id="total" value="<?php echo $total; ?>" autocomplete="off">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <div>
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
                </div> -->
                </div>
            </section>

            <section class="formulario container">
                <div class="grid3">
                    <center>
                        <div>
                            <textarea name="firma_representante_tecnico" id="firma_representante_tecnico" cols="25" rows="10"></textarea>
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
                        <input type="submit" class="boton boton__registrar" value="Registrar" onclick="generapdf()">
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