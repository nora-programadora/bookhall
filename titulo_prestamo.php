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
        
     
     $codigo = $_POST['usuario_escondido'];
     $consulta = "SELECT nombre , correo , estatus , codigo , tipo FROM  usuario WHERE codigo = '$codigo'";
     $resultadosUsuario = mysqli_query($conexion,$consulta);
     $tablaUsuario = mysqli_fetch_assoc($resultadosUsuario);

     $nombre = $tablaUsuario['nombre'];
     $correo = $tablaUsuario['correo'];
     $estatus = $tablaUsuario['estatus'];
     $codigo = $tablaUsuario['codigo'];
     $tipo = $tablaUsuario['tipo'];
    
     $codigo_titulo = $_POST['codigo_titulo'];
     $consultaTitulo= "SELECT titulo , autor , volumen , editorial , codigo FROM  titulo_ejemplar WHERE codigo = '$codigo_titulo'";
     $resultadosTitulo = mysqli_query($conexion,$consultaTitulo);
     $tablaEjemplar = mysqli_fetch_assoc($resultadosTitulo);

     $titulo = $tablaEjemplar['titulo'];
     $autor = $tablaEjemplar['autor'];
     $volumen = $tablaEjemplar['volumen'];
     $codigo_titulo = $tablaEjemplar['codigo'];
     $editorial = $tablaEjemplar['editorial'];
     $startDate = date("Y-m-d");
     $endDate = strtotime ( '+7 day' , strtotime ( $startDate ) ) ;
     $endDate = date ( 'Y-m-j' , $endDate );

     /*$consultaTipo= "SELECT id FROM  tipo_aticulo WHERE tipo_ejemplar = 'Libro' ";
     $resultadosTipo = mysqli_query($conexion,$consultaTipo);
     $tablaTipo = mysqli_fetch_assoc($resultadosTipo);

     $tipoArticulo = $tablaTipo['id'];*/
       
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
                 </tr>
             </table>
         </center>
        <center>
            <div><h1 class="titulo">Información de título</h1></div>
            <table class="formulario">
            <tr>
                <td class="name first"><label>Código</label></td>
                <td class="i-form"><input type="text" name="codigo" placeholder="" value="<?php echo $codigo_titulo ?>" class="prestamos"></td>
             </tr>
             <tr>
                <td class="name"><label>Titulo</label></td>
                <td class="i-form"><input type="text" name="codigo" placeholder="" value="<?php echo $titulo ?>" class="prestamos"></td>
             </tr>
             <tr> 
                <td class="name"><label>Autor</label></td>
                <td class="i-form"><input type="text" name="titulo_ejemplar" placeholder="Estructura de datos II" value="<?php echo $autor ?>" class="prestamos"></td>
             </tr>
             <tr> 
                <td class="name"><label>Volumen</label></td>
                <td class="i-form"><input type="text" name="volumen" placeholder="1" value="<?php echo $volumen ?>" class="prestamos"></td>
             </tr>
             <tr> 
                <td class="name"><label>Editorial</label></td>
                <td class="i-form last"><input type="text" name="procedencia" placeholder="Mc Graw Hill" value="<?php echo $editorial ?>" class="prestamos"></td>
             </tr>
         </table>
     </center>
    </form>
    <div class="formulario">
    <form action="prestamo_final.php" method="post" enctype="multipart/form-data" class="registro-usuario" >
        <center>
         <div><h1 class="titulo">Prestamo solicitado</h1></div>
         <table class="formulario paraprestamo" style="" >
          <tr>
            <th class="r-title"><label>Código de alumno</label></th>
            <th class="r-title"><label>Código de ejemplar</label></th>
            <th class="r-title"><label>Titulo</label></th>
            <th class="r-title"><label>Fecha Inicio</label></th>
            <th class="r-title"><label>Fecha fin </label></th>
          </tr>
          <tr>
            <td class="r-name"><label><?php echo $codigo ?></label></td>
            <td class="r-name"><label><?php echo $codigo_titulo ?></label></td>
            <td class="r-name"><label><?php echo $titulo ?></label></td>
            <td class="r-name"><label><?php echo $startDate ?></label></td>
            <td class="r-name"><label><?php echo $endDate ?></label></td>
          </tr>
          <input type="hidden" id="" name="codigo_usuariof" value="<?php echo $codigo; ?>">
          <input type="hidden" id="" name="codigo_titulo_prestamo" value="<?php echo $codigo_titulo; ?>">
          <input type="hidden" id="" name="startDate" value="<?php echo $startDate; ?>">
          <input type="hidden" id="" name="endtDate" value="<?php echo $endDate; ?>">
          <input type="hidden" id="" name="tipo_aticulo" value="<?php //echo $resultadosTipo; ?>">
         </table>
     </center>
        <div class="botones b-prestamo">
           <!--<label><input type="reset" value="Borrar"></input></label>-->
           <label><input type="submit" value="Registrar" class="enviar"></input></label>
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