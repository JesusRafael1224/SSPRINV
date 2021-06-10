<?php

function conectarDB() : mysqli{
$db = mysqli_connect('localhost', 'root', '', 'investigacion');
mysqli_set_charset($db, 'utf8mb4');
/* 
if(!$db){
    echo "Error no se pudo conectar";
    exit;
}else{
    echo "Conexion exitosa...";
}
*/
 return $db;
}
