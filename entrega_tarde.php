<?php
        header("location: devolucion.html");
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
        
     $codigo_titulo = $_POST['codigo_titulo_d'];
     $codigo = $_POST['codigo_usuario_d'];
     $fecha_prestamo = $_POST['startDate'];
     $fecha_final = $_POST['endtDate'];
     $idprestamo = $_POST['idprestamo'];
     $tarde = $_POST['tarde'];
     $cobro = $_POST['pago'];

     $consultaTitulo= "SELECT id_titulo FROM  titulo_ejemplar WHERE codigo = '$codigo_titulo'";
     $resultadosTitulo = mysqli_query($conexion,$consultaTitulo);
     $tablaEjemplar = mysqli_fetch_assoc($resultadosTitulo);

     $idEjemplarFinal = $tablaEjemplar['id_titulo'];


     $consulta = "SELECT id_usuario FROM  usuario WHERE codigo = '$codigo'";
     $resultadosUsuario = mysqli_query($conexion,$consulta);
     $tablaUsuario = mysqli_fetch_assoc($resultadosUsuario);

     $idUsuarioFinal = $tablaUsuario['id_usuario'];
    
     
     $InsercionDevolucion = "INSERT INTO devolucion (id_ejemplar , fecha_prestamo ,fecha_limite, id_prestamo , id_usuario , tarde , pago) 
                            VALUES ('$idEjemplarFinal', '$fecha_prestamo' , '$fecha_final' , '$idprestamo', '$idUsuarioFinal' , b'$tarde' , '$cobro' ) ";
     $resultadoDevolucion = mysqli_query($conexion , $InsercionDevolucion);
       
     //echo $InsercionDevolucion;
?>