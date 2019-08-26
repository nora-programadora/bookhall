<?php
header("location: registro-ejemplar-libro.html");
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
$codigo = $_POST['codigo'];
$titulo = $_POST['titulo_ejemplar'];
$autor = $_POST['autor'];
$volumen = $_POST['volumen'];
$fecha = $_POST['fecha'];
$procedencia = $_POST['procedencia'];
//Pie editorial
$lugar = $_POST['lugar'];
$fecha_edicion = $_POST['fecha_edicion'];
$editorial = $_POST['editorial'];
$anio = $_POST['anio'];


$insertarEjemplarLibro = "INSERT INTO titulo_ejemplar (titulo, autor , volumen , fecha_registro , procedencia , lugar, fecha_edicion, editorial, anio, codigo) 
                    VALUES ('$titulo' , '$autor' ,'$volumen' ,'$fecha' , '$procedencia' , '$lugar', '$fecha_edicion', '$editorial', '$anio', '$codigo' )";
$resultInsercionEjemplar= mysqli_query($conexion , $insertarEjemplarLibro);

if (mysqli_connect_errno()) {
            echo mysqli_connect_errno();
        }else{
            //echo "Registro en la tabla Tipo / ";
            //echo $insertarMarca. " ";
            //echo $insertarEjemplarLibro;
            //header("Location: registro-usuario.html");
        }
?>

