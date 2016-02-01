<?php

$conexion=mysqli_connect("mysql.hostinger.es","u801187417_wp","Cf93mhcQe","u801187417_wp") or
die("Problemas con la conexión");

$caja = '$_POST[buscar]';

mysqli_query($conexion, "")
  or die("Problemas en el select".mysqli_error($conexion));





mysqli_close($conexion);



?>

<div>hfdhjdfhjdfhjdfhjdfhjdf</div>
