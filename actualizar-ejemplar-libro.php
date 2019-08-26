
<?php
header("location: actualizar-ejemplar-libro.html");
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
$actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET titulo = '$titulo', autor= '$autor', volumen = '$volumen', fecha_registro ='$fecha' ,
                        procedencia ='$procedencia' , lugar = '$lugar' , fecha_edicion= '$fecha_edicion' , editorial = '$editorial' , anio = '$anio'
                            WHERE codigo = '$codigo_nuevo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}
/*
if(!(empty($autor))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET  autor= '$autor' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}


if(!(empty($volumen))){

    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET volumen = '$volumen' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($fecha))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET fecha_registro ='$fecha' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($procedencia))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET  procedencia ='$procedencia' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($lugar))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET lugar = '$lugar'
     WHERE id_titulo = '$id' ";
     mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($fecha_edicion))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET  fecha_edicion= '$fecha_edicion' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($editorial))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET  editorial = '$editorial' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}

if(!(empty($anio))){
    $actualizarEjemplarLibro = "UPDATE titulo_ejemplar SET  anio = '$anio' WHERE codigo = '$codigo' ";
    mysqli_query($conexion , $actualizarEjemplarLibro);
}*/
//echo $actualizarEjemplarLibro;
mysqli_close($conexion);
?>


