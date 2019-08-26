
<?php
header("location: eliminar-ejemplar-libro.html");
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

$codigo_nuevo= $_POST['codigo_nuevo'];
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


if(!(empty($titulo))){
$eliminarEjemplarLibro = "DELETE FROM titulo_ejemplar WHERE codigo = '$codigo_nuevo' ";
    mysqli_query($conexion , $eliminarEjemplarLibro);
}
//echo $eliminarEjemplarLibro;
mysqli_close($conexion);
?>


