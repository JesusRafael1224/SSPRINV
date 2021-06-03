<?php

function conectarDB() : mysqli{
$db = mysqli_connect('localhost', 'root', '', 'investigacion');
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
