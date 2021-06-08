<?php

$db = mysqli_connect('Localhost', 'root', '', 'sistema');

if(!$db){
echo "Error en la conexion";

}else{
    echo "conexion exitosa";
}