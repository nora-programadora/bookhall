<?php
        header("location: prestamo.html");
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
        
     
     $codigo = $_POST['codigo_usuariof'];
     $codigo_titulo = $_POST['codigo_titulo_prestamo'];
     $fecha_prestamo = $_POST['startDate'];
     $fecha_final = $_POST['endtDate'];
     //$tipo_articulo = $_POST['tipo_articulo'];


     $consulta = "SELECT id_usuario FROM  usuario WHERE codigo = '$codigo'";
     $resultadosUsuario = mysqli_query($conexion,$consulta);
     $tablaUsuario = mysqli_fetch_assoc($resultadosUsuario);

     $idUsuarioFinal = $tablaUsuario['id_usuario'];
    
     $codigo_titulo = $_POST['codigo_titulo_prestamo'];
     $consultaTitulo= "SELECT id_titulo FROM  titulo_ejemplar WHERE codigo = '$codigo_titulo'";
     $resultadosTitulo = mysqli_query($conexion,$consultaTitulo);
     $tablaEjemplar = mysqli_fetch_assoc($resultadosTitulo);

     $idEjemplarFinal = $tablaEjemplar['id_titulo'];

     
     $InsercionPrestamo = "INSERT INTO prestamo (codigo_usuario , id_ejemplar , fecha_prestamo , fecha_limite, tipo_articulo) 
                            VALUES ('$idUsuarioFinal', '$idEjemplarFinal' , '$fecha_prestamo' , '$fecha_final' , '1') ";
     $resultadoPrestamo = mysqli_query($conexion , $InsercionPrestamo);
       
     //echo $InsercionPrestamo;
?>