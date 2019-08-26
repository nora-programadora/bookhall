<?php
        header("location: comentario.html");
        require("conexion.php");
        
        $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);
        
        if(mysqli_connect_errno()){
            echo "fallo al conectar con la base de datos";
            exit();
        }
        
        $database = mysqli_select_db($conexion, $db_nombre);
        
        if(!$database){
            die('ERROR CONEXION CON BD: '. mysql.error());
        }
        
     $comentario = $_POST['comentario'];
     $correo = $_POST['correo'];    
     
     $InsercionComentario = "INSERT INTO comentario (comentario , correo ) 
                            VALUES ('$comentario', '$correo') ";
     $resultadoComentario = mysqli_query($conexion , $InsercionComentario);
       
     //echo $InsercionComentario;
?>