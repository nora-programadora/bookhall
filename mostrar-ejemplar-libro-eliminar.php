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
        
     
     $codigo = $_POST['codigo_ejemplar'];
     $consulta = "SELECT titulo , autor , volumen , fecha_registro , procedencia , lugar, fecha_edicion, editorial, anio, codigo 
                  FROM  titulo_ejemplar WHERE codigo = '$codigo'";
     $resultados = mysqli_query($conexion,$consulta);
     $tablaEjemplar = mysqli_fetch_assoc($resultados);

     $titulo = $tablaEjemplar['titulo'];
     $autor = $tablaEjemplar['autor'];
     $editorial = $tablaEjemplar['editorial'];
     $volumen = $tablaEjemplar['volumen'];
     $fecha_registro = $tablaEjemplar['fecha_registro'];
     $procedencia = $tablaEjemplar['procedencia'];
     $lugar = $tablaEjemplar['lugar'];
     $fecha_edicion = $tablaEjemplar['fecha_edicion'];
     $anio = $tablaEjemplar['anio'];
     $codigo_paranuevo = $tablaEjemplar['codigo'];
       
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta charset="UTF-8">
    <title>BookHall</title>
    <link rel="icon" type="image/png" href="img/libros.png" />
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="icon" type="image/png" href="" />
</head>
<body>
<div class="menuContainer"></div>
<div><h1 class="titulo">Eliminar ejemplar de libro</h1></div>
<div class="formulario">
    <form action="eliminar-ejemplar-libro.php" method="post" enctype="multipart/form-data" class="registro-usuario titulo" >
    	<center>
        <table class="formulario">
          <tr>
            <td class="name first "><label>Código de ejemplar</label></td>
            <td class="i-form last"><input type="text" name="codigo_nuevo" placeholder="213400059" value="<?php echo $codigo_paranuevo?>"></td>
         </tr>
         </table>
         </center>
	     <br>
	     <center>
	     <div><h1 class="titulo">Información del ejemplar</h1></div>
	        <table class="formulario">
                <tr> 
                    <td class="name first"><label>Titulo de ejemplar</label></td>
                    <td class="i-form"><input type="text" name="titulo_ejemplar" placeholder="Estructura de datos II" value="<?php echo $titulo?>"></td>
                </tr>
                <tr> 
                    <td class="name"><label>Autor</label></td>
                    <td class="i-form"><input type="text" name="autor" placeholder="Koffman" value="<?php echo $autor?>"></td>
                </tr>
                <tr> 
                    <td class="name"><label>Volumen</label></td>
                    <td class="i-form"><input type="text" name="volumen" placeholder="1" value="<?php echo $volumen?>"></td>
                </tr>
                <tr> 
                    <td class="name"><label>Fecha</label></td>
                    <td class="i-form"><input type="text" name="fecha" placeholder="AAAA/MM/DD" value="<?php echo $fecha_registro?>" class="el-date"></td>
                </tr>
                <tr> 
                    <td class="name"><label>Procedencia</label></td>
                    <td class="i-form last"><input type="text" name="procedencia" placeholder="Biblioteca del estado" value="<?php echo $procedencia?>"></td>
                </tr>
            </table>
            <br>
             <div><h2 class="titulo">Pie editorial</h2></div>
             <table class="formulario pie-editorial">
                 <tr> 
                    <td class="name first"><label>Lugar</label></td>
                    <td class="i-form"><input type="text" name="lugar" placeholder="País/región" value="<?php echo $lugar?>"></td>
                 </tr>
                 <tr> 
                    <td class="name"><label>Fecha de edición</label></td>
                    <td class="i-form"><input type="text" name="fecha_edicion" placeholder="1999" value="<?php echo $fecha_edicion?>"></td>
                 </tr>
                 <tr> 
                    <td class="name"><label>Editorial</label></td>
                    <td class="i-form"><input type="text" name="editorial" placeholder="Mc Graw Hill" value="<?php echo $editorial?>"></td>
                 </tr>
                 <tr>
                    <td class="name"><label>Año</label></td>
                    <td class="i-form last"><input type="text" name="anio" placeholder="1998" value="<?php echo $anio?>"></td>
                 </tr>
             </table>
             </center>
             <div><h1 class="titulo">Eliminar información del ejemplar?</h1></div>
             <div class="botones r-usuario">
                 <label><input type="reset" value="Borrar"></input></label>
                 <label><input type="submit" value="Eliminar" class="enviar"></input></label>
             </div>
    </form>
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