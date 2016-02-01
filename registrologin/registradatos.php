<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php

	
	$var=$_POST['password'];
	$encriptado=md5($var);
	$email = $_POST['email'];
	$fechaalta=strftime( "%Y-%m-%d", time() );
	$bloqueado = 0;
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		
		$conexion=mysqli_connect("mysql.hostinger.es","u801187417_wp","Cf93mhcQe","u801187417_wp") or
    die("Problemas con la conexión");

mysqli_query($conexion,"insert into usuarios(Usuario_nombre,Usuario_apellido1,Usuario_apellido2,Usuario_nick,Usuario_clave,Usuario_claveencriptada,Usuario_fecha_alta,Usuario_email,Usuario_bloqueado,Usuario_domicilio,Usuario_provincia,Usuario_poblacion,Usuario_nif,Usuario_numero_telefono,Usuario_fecha_contratacion) values
                   ('$_REQUEST[nombre]','$_REQUEST[apellido1]','$_REQUEST[apellido2]','$_REQUEST[nick]','$_REQUEST[password]','$encriptado','$fechaalta','$_REQUEST[email]','$bloqueado','$_REQUEST[domicilio]','$_REQUEST[provincia]','$_REQUEST[poblacion]','$_REQUEST[nif]','$_REQUEST[numerotelefono]','$_REQUEST[fechacontratacion]')")
  or die("Problemas en el select 2".mysqli_error($conexion));

  	
	$usuario = $_REQUEST['nick'];
    $cadena = $_REQUEST['password'];
	$desde = "From: " . "juanluisfloresgarcia94@gmail.com";
    $asunto = "Usuario y contraseña de Reparaciones Trebujena";
    $mensaje = "Su usuario es: " . $usuario . " y su contraseña es: " . $cadena;
    mail($email,$asunto,$mensaje,$desde);

  header('Location: ../index3.html');

mysqli_close($conexion);
		
		}
		
		else {
			
			 header('Location: ../index.html');
			
			}
	
	


?>
</body>
</html>