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
        
     
     $codigo = $_POST['codigo_usuario'];
     $consulta = "SELECT nombre , correo , estatus , codigo , tipo FROM  usuario WHERE codigo = '$codigo'";
     $resultados = mysqli_query($conexion,$consulta);
     $tablaUsuario = mysqli_fetch_assoc($resultados);

     $nombre = $tablaUsuario['nombre'];
     $correo = $tablaUsuario['correo'];
     $estatus = $tablaUsuario['estatus'];
     $codigo = $tablaUsuario['codigo'];
     $tipo = $tablaUsuario['tipo'];
       
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
<div><h1 class="titulo">Prestamo</h1></div>
<div class="formulario">
    <form action="Prestamo.php" method="post" enctype="multipart/form-data" class="registro-usuario" >
    	<center>
        <table class="formulario">
          <tr>
            <td class="name first "><label>Código de usuario</label></td>
            <td class="i-form last"><input type="text" name="codigo_usuario" placeholder="213400059" value=""></td>
         </tr>
         </table>
         </center>
	     <br>
         <div class="botones b-prestamo">
            <label><input type="reset" value="Borrar"></input></label>
            <label><input type="submit" value="Buscar" class="enviar"></input></label>
         </div>
	     <center>
	     <div><h1 class="titulo">Información de perfil</h1></div>
	     <table class="formulario pie-editorial">
            <?php?>
	         <tr> 
	            <td class="name first"><label>Nombre</label></td>
	            <td class="i-form"><input type="text" name="nombre_usuario" placeholder="" value="<?php echo $nombre?>" class="prestamos"></td>
	         </tr>
	         <tr> 
	            <td class="name"><label>Correo</label></td>
	            <td class="i-form"><input type="text" name="correo" placeholder="" value="<?php echo $correo?>" class="prestamos"></td>
	         </tr>
	         <tr> 
	            <td class="name"><label>Estatus</label></td>
	            <td class="i-form"><input type="text" name="estatus" placeholder="" value="<?php echo $estatus ?>" class="prestamos"></td>
	         </tr>
             <tr> 
                <td class="name"><label>Código</label></td>
                <td class="i-form"><input type="text" name="codigo_usuario" placeholder="" value="<?php echo $codigo ?>" class="prestamos"></td>
             </tr>
	         <tr>
	            <td class="name"><label>Tipo de usuario</label></td>
	            <td class="i-form last"><input type="text" name="tipo" placeholder="" value="<?php echo $tipo ?>" class="prestamos"></td>
	         </tr>
             <?php ?> 
	     </table>
	     </center>
    </form>
</div>
<div class="formulario">
    <form action="titulo_prestamo.php" method="post" enctype="multipart/form-data" class="registro-usuario" >
         <center>
         <div><h1 class="titulo">Código de título</h1></div>
         <table class="formulario">
             <tr> 
                <td class="name first last"><label>Código de titulo</label></td>
                <td class="i-form last"><input type="text" name="codigo_titulo" placeholder="20203040" value=""></td>
                <input type="hidden" id="" name="usuario_escondido" value="<?php echo $codigo; ?>">
             </tr>
         </table>
         </center>
         <div class="botones b-prestamo">
           <label><input type="reset" value="Borrar"></input></label>
           <label><input type="submit" value="Buscar" class="enviar"></input></label>
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