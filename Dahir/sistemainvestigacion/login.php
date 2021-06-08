<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "uploadfile";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("NO HAY CONEXION:" .mysqli_connect_error());
}
$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn, "SELECT * FROM uploadfile WHERE id= '".$nombre."' and password = '".$pass."'");
$nr =mysqli_num_rows($query);

if($id == 1)
{
    header("Location: index.html");
    //echo "BIENVENIDO" .$nombre;
}
else if ($id == 0)
{
   // header("Location: index.html");
  //echo "NO INGRESO";
}
?>