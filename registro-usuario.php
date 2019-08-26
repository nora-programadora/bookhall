<?php
require("conexion.php");

//CONEXIÓN A LA BASE DE DATOS
$conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);
/*
    $db_host ="localhost";
    $db_nombre ="cerveza";
    $db_usuario ="root";
    $db_password ="";
*/
if(mysqli_connect_errno()){
            echo "fallo al conectar con la base de datos";
            exit();
        }

$database = mysqli_select_db($conexion, $db_nombre);

if(!$database){
    die('ERROR CONEXION CON BD: '. mysql.error());
    echo "hi";
}

$nombre = $_POST['nombre_usuario'];
$codigo = $_POST['codigo'];
$tipo_usuario = $_POST['tipo_usuario'];
$estatus = $_POST['estatus'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$insertarUsuario = "INSERT INTO usuario (nombre, correo , estatus , contrasena , codigo , tipo) 
                    VALUES ('$nombre' , '$correo' ,'$estatus' ,'$contrasena' , '$codigo' , '$tipo_usuario' )";
$resultUsuario= mysqli_query($conexion , $insertarUsuario);

if (mysqli_connect_errno()) {
            echo mysqli_connect_errno();
}else{
    //echo "Registro en la tabla Tipo / ";
    //echo $insertarMarca. " ";
    //echo $insertarUsuario;
    header("Location: registro-usuario.html");
}
?>

