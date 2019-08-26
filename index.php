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
        
     
     $palabra = $_POST['palabra'];
     $consulta = "SELECT titulo , autor , editorial , anio FROM  titulo_ejemplar WHERE titulo = '$palabra'";
     $resultados = mysqli_query($conexion,$consulta);
       
?>
<!--------------------------------------------------------------------------------------------------->
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
<div><h1 class="titulo">Resultados</h1></div>
<center>
<div class="formulario">
<table class="formulario" style="" >
  <tr>
    <th class="r-title"><label>Titulo</label></th>
    <th class="r-title"><label>Autor</label></th>
    <th class="r-title"><label>Editorial</label></th>
    <th class="r-title"><label>Año</label></th>
  </tr>
  <?php While (($fila = mysqli_fetch_row($resultados)) == true){ ?>
    <tr>
    <td class="r-name"><label><?php echo $fila[0] ?></label></td>
    <td class="r-name"><label><?php echo $fila[1] ?></label></td>
    <td class="r-name"><label><?php echo $fila[2] ?></label></td>
    <td class="r-name"><label><?php echo $fila[3] ?></label></td>
    </tr>
  <?php } ?> 
</table>
</div>
</center>
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