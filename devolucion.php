<?php

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
        
     
     $codigoUsuario= $_POST['c_usuario'];
     $consulta_usuario = "SELECT id_usuario , nombre , correo , estatus , codigo , tipo FROM  usuario WHERE codigo = '$codigoUsuario'";
     $resultadosUsuario = mysqli_query($conexion,$consulta_usuario);
     $tablaUsuario = mysqli_fetch_assoc($resultadosUsuario);

     $idUsuarioFinal = $tablaUsuario['id_usuario'];
     $nombre = $tablaUsuario['nombre'];
     $correo = $tablaUsuario['correo'];
     $estatus = $tablaUsuario['estatus'];
     $codigo = $tablaUsuario['codigo'];
     $tipo = $tablaUsuario['tipo'];
    
     $codigo_titulo = $_POST['c_ejemplar'];
     $consultaTitulo= "SELECT id_titulo, titulo , autor , volumen , editorial , codigo FROM  titulo_ejemplar WHERE codigo = '$codigo_titulo'";
     $resultadosTitulo = mysqli_query($conexion,$consultaTitulo);
     $tablaEjemplar = mysqli_fetch_assoc($resultadosTitulo);

     $idEjemplarFinal = $tablaEjemplar['id_titulo'];
     $titulo = $tablaEjemplar['titulo'];
     $autor = $tablaEjemplar['autor'];
     $volumen = $tablaEjemplar['volumen'];
     $codigo_titulo = $tablaEjemplar['codigo'];
     $editorial = $tablaEjemplar['editorial'];


     $consultaPrestamo = "SELECT id, fecha_prestamo, fecha_limite FROM  prestamo WHERE codigo_usuario = '$idUsuarioFinal' AND id_ejemplar = '$idEjemplarFinal'";
     $resultadosPrestamo = mysqli_query($conexion,$consultaPrestamo);
     $tablaPrestamo = mysqli_fetch_assoc($resultadosPrestamo);

     $id = $tablaPrestamo['id'];
     $startDate = $tablaPrestamo['fecha_prestamo'];
     $endDate = $tablaPrestamo['fecha_limite'];
     $today = date("Y-m-d");
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <title>BookHall</title>
    <link rel="icon" type="image/png" href="img/libros.png" />
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
<div class="menuContainer"></div>
<div><h1 class="titulo">Devolución</h1></div>
<div class="formulario">
    <form action="devolucion.php" method="post" enctype="multipart/form-data" class="registro-usuario" >
      <center>
        <table class="formulario">
          <tr>
            <td class="name first"><label>Código de usuario</label></td>
            <td class="i-form"><input type="text" name="codigo_usuario" placeholder="" value=""></td>
         </tr>
         <tr>             
            <td class="name "><label>Código de ejemplar</label></td>
            <td class="i-form last"><input type="text" name="codigo_ejemplar" placeholder="" value=""></td>
         </tr>
         </table>
         </center>
       <br>
       <div class="botones b-prestamo">
           <label><input type="reset" value="Borrar"></input></label>
           <label><input type="submit" value="Buscar" class="enviar"></input></label>
       </div>
    </form>
    <div class="formulario">
    <form action="entrega.php" method="post" enctype="multipart/form-data" class="registro-usuario" >
        <center>
         <div><h1 class="titulo">Datos de la devolución</h1></div>
         <table class="formulario paraprestamo" style="" >
          <tr>
            <th class="r-title"><label>Código de alumno</label></th>
            <th class="r-title"><label>Código de ejemplar</label></th>
            <th class="r-title"><label>Titulo</label></th>
            <th class="r-title"><label>Fecha Inicio</label></th>
            <th class="r-title"><label>Fecha fin </label></th>
            <th class="r-title"><label>Estado </label></th>
            <?php 
                if($endDate < $today){
                    echo "<th class='r-title'><label> Adeudo </label></th>";
                }
                else{
                }                        
            ?>
          </tr>
          <tr>
            <td class="r-name"><label><?php echo $codigo ?></label></td>
            <td class="r-name"><label><?php echo $codigo_titulo ?></label></td>
            <td class="r-name"><label><?php echo $titulo ?></label></td>
            <td class="r-name"><label><?php echo $startDate ?></label></td>
            <td class="r-name"><label><?php echo $endDate ?></label></td>
            <td class="r-name">
                <label>
                    <?php 
                        if($endDate < $today){

                            $diff = abs(strtotime($today) - strtotime($endDate));
                            $years = floor($diff / (365*60*60*24));
                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                            echo "entrega con retraso de ". $days ." días";

                            /*echo "</br> Años ";
                            echo $years = floor($diff / (365*60*60*24));
                            echo "</br> Meses ";
                            echo $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            echo "</br> Días ";
                            echo $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            echo "</br>";*/
                        }
                        else{
                            echo "entrega a tiempo";
                        }
                     ?>
                </label>
            </td>
            <?php 

                if($endDate < $today){ 
                    $monto = $days * 5;
                    $late = true; 
                    ?>
                    <td class="r-name"><label><?php echo "$".$monto ?></label></td>
            <?php   
                }
                else{
                $late = false; 
                }
            ?>
          </tr>
          <input type="hidden" id="" name="codigo_usuario_d" value="<?php echo $codigo; ?>">
          <input type="hidden" id="" name="codigo_titulo_d" value="<?php echo $codigo_titulo; ?>">
          <input type="hidden" id="" name="startDate" value="<?php echo $startDate; ?>">
          <input type="hidden" id="" name="endtDate" value="<?php echo $endDate; ?>">
          <input type="hidden" id="" name="idprestamo" value="<?php echo $id; ?>">
          <input type="hidden" id="" name="tarde" value="<?php echo $late; ?>">
         </table>
     </center>
        <div class="botones b-prestamo">
           <!--<label><input type="reset" value="Borrar"></input></label>-->
           <?php 
                if($endDate < $today){

                }
                else{
                echo "<label><input type='submit' value='Registrar' class='enviar'></input></label>";
                }
            ?>
           
        </div>
    </form>
    <?php 
        if($endDate < $today){ ?>
            <form action="entrega_tarde.php" method="post"  class="registro-usuario" >
                <input type="hidden" id="" name="codigo_usuario_d" value="<?php echo $codigo; ?>">
                <input type="hidden" id="" name="codigo_titulo_d" value="<?php echo $codigo_titulo; ?>">
                <input type="hidden" id="" name="startDate" value="<?php echo $startDate; ?>">
                <input type="hidden" id="" name="endtDate" value="<?php echo $endDate; ?>">
                <input type="hidden" id="" name="idprestamo" value="<?php echo $id; ?>">
                <input type="hidden" id="" name="tarde" value="<?php echo $late; ?>">
                <input type="hidden" id="" name="pago" value="<?php echo $monto; ?>">
                <div class="botones b-prestamo">
                <center>
                   <label><input type="submit" value="Pagar y registrar" class="enviar"></input></label>
                </center>
               </div>
            </form>
    <?php
        }
        else{
        echo "";
        }
    ?>
                    
</div>
</body>
<script>
    $(document).ready(function () {
      $('.menuContainer').load('./menu.html');
    });
</script>
</html>
<?php
  mysqli_close($conexion);
?>