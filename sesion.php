
<?php 


	require("conexion.php");

	//CONEXIÓN A LA BASE DE DATOS
	$conexion = mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);


	$database = mysqli_select_db($conexion, $db_nombre);

	$usuario = $_POST['User'];
	$pass = $_POST['Pass'];


	$probar = "SELECT id_Actor FROM actor WHERE id_Actor = '$usuario' AND contrasena = '$pass'" ;
	$a= mysqli_query($conexion , $probar);
	$c=  mysqli_fetch_row($a);
	if($c[0]== $usuario)
	{

    	$fila = mysqli_fetch_row($a);
    	echo $c[0];
    	$permiso= "SELECT nombre FROM rol WHERE id_rol = (SELECT idRol FROM rol_actor WHERE idActor = '$c[0]')";
    	$principal = mysqli_query($conexion , $permiso);
    	
    	if($principal){
    		echo $fila[0];
    		$fila = mysqli_fetch_row($principal);
    		if($fila[0]=="Bibliotecario"){
    			
    			header("location:registro-ejemplar-libro.html");
    			
    		}
    		if($fila[0]=="Prestamista"){
    			
    			header("location:prestamo.html");
    		}

    		if($fila[0]=="Administrador"){
    			
    			header("location:index.html");
    		}	
 		}
	}
	else{

		$usu = $_POST['User'];
		$pa = $_POST['Pass'];

			
		$probar2 = "SELECT  codigo FROM usuario WHERE codigo = '$usu' AND contrasena = '$pa'" ;
		
		$b= mysqli_query($conexion,$probar2);
		$asd=  mysqli_fetch_row($b);
		echo $asd[0];
		if($asd[0]==$usu){
			header("location:index.html");	
		}
		else{
			header("location:login-general.html");
		}
	}


	

 ?>