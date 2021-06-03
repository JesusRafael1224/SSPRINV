<?php
require 'database.php';
$db = conectarDB();

//Arreglo con mensajes de errores
$errores = [];

    $nombre = '';
    $empleado = '';
    $telefono = '';
    $correo = '';
    $area = '';
    $usuario = '';
    $contrasena = '';
    //$confirmar_contrasena = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //exit;
    $nombre = mysqli_real_escape_string($db, filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING));
    $empleado = mysqli_real_escape_string($db, filter_var( $_POST['empleado'], FILTER_VALIDATE_INT) );
    $telefono = mysqli_real_escape_string($db, filter_var( $_POST['telefono'], FILTER_VALIDATE_INT));
    $correo = mysqli_real_escape_string($db, filter_var( $_POST['correo'], FILTER_VALIDATE_EMAIL));
    $area = mysqli_real_escape_string($db, filter_var( $_POST['area'], FILTER_SANITIZE_STRING));
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($db, $_POST['contrasena']);
    //$confirmar_contrasena = $_POST['confrirmar_contrasena'];

    if(!$nombre){
        $errores[] = "Debes añadir tu nombre";
    }
    if(!$empleado){
        $errores[] = "Debes añadir tu numero de empleado o matricula";
    }
    if(!$telefono){
        $errores[] = "Debes un numero telefonico";
    }
    if(!$correo){
        $errores[] = "Debes añadir tu correo electronico";
    }
    if(!$area){
        $errores[] = "Debes añadir tu area de trbajo";
    }
    if(!$usuario){
        $errores[] = "Debes añadir un usuario";
    }
    if(!$contrasena){
        $errores[] = "Debes añadir una contraseña";
    }
   
    //echo "<pre>";
    //var_dump($errores);
    //echo "</pre>";

    //Revisar que el arreglo de errores este vacio 
    if(empty($errores)){
        //Insertar en la base de datos
        $query = "INSERT INTO empleado (nombre, no_empleado, telefono, correo, area_trabajo) VALUES ('$nombre', '$empleado', '$telefono', '$correo', '$area')";

    $query = "INSERT INTO usuarios (username, contrasena) VALUES ('$usuario', '$contrasena')";

    $resultado = mysqli_query($db, $query);

    if($resultado){
        header('location: /registro_proyecto.php');
        //echo "Registrado correctamente";
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
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preload" href="/css/normalize.css" as="style"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<link rel="preload" href="/css/altausuario.css" as="style" />
    <link rel="stylesheet" href="/css/altausuario.css">
</head>
<body>
    <header class="header">
    <a href="alta_usuario.php">
    <img src="/image/logotecnologico.png" alt="Logotipo" class="header__logo">
    </a>
    <h2>Nuevo Usuario</h2>
    </header>
    <main class="contenedor">
        <section>
                <form action="" method="POST" class="formulario sombra">
                    <fieldset>
                        <h3>Favor de llenar todos los apartados</h3>
                        <?php foreach($errores as $error): ?>
                            <div class="alerta error">
                            <?php  echo $error; ?>
                            </div>
                        <?php endforeach; ?>

                        <div class="grid">
                            <div class="campo campo__nombre">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="input-text" name="nombre" placeholder="Escribe tu nombre" autocomplete="off" value="<?php echo $nombre; ?>">
                            </div>
                            <div class="campo campo__empleado">
                                <label for="empleado">No. Empleado o Matricula</label>
                                <input type="number" class="input-text" name="empleado" placeholder="Número de empleado o matrícula" autocomplete="off" value="<?php echo $empleado; ?>">
                            </div>
                            <div class="campo campo__telefono">
                                <label for="telefono">Teléfono:</label>
                                <input type="number" class="input-text" name="telefono" placeholder="Escribe tu numero telefónico" autocomplete="off" value="<?php echo $telefono;?>">
                            </div>
                            <div class="campo campo__correo">
                                <label for="correo">Correo:</label>
                                <input type="email" class="input-text" name="correo" placeholder="Escribe tu correo electrónico" autocomplete="off" value="<?php echo $correo; ?>">
                            </div>
                            <div class="campo campo__area">
                                <label for="area">Área de trabajo</label>
                                <input type="text" class="input-text" name="area" placeholder="Escribe tu area de trabajo" autocomplete="off" value="<?php echo $area;?>">
                            </div>
                            <div class="campo campo__usuario">
                                <label for="usuario">Usuario:</label>
                                <input type="text" class="input-text" name="usuario" autocomplete="off" value="<?php echo $usuario;?>">
                            </div>
                            <div class="campo campo__contrasena">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" class="input-text" name="contrasena" autocomplete="off" value="<?php echo $contrasena;?>">
                            </div>
                            <!--
                            <div class="campo campo_confirmar_contrasena">
                                <label for="confirmar_contrasena">Confirmar contraseña:</label>
                                <input type="password" class="input-text" name="confirmar_contrasena" autocomplete="off" value="<?php echo $confirmar_contrasena;?>">
                            </div>
                            -->
                            <div class="registrar">
                            <input type="submit" class="boton" value="Registrar">
                            </div>
                        </div>
                    </fieldset>
                </form>
        </section>
    </main>
    <footer class="footer">
    <img src="/image/logofooter.PNG" alt="Logotipo" class="footer__logo">
    </footer>
</body>
</html>