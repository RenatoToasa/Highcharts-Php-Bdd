<?php
$server = "localhost";
$usuario = "root";
$pass = "utafisei";
$BD = "datos";


$link = mysqli_connect($server, $usuario, $pass, $BD); 
//mysql_select_db("datos",$db);
$sql = "INSERT INTO mediciones (id_estacion,lluvia,vel_viento,dir_viento,temper,pres_atm,fecha,luz,humed) " +
  "VALUES ('$id_estacion', '$lluvia', '$vviento', '$dviento','$')";
$result = mysql_query($sql);
echo "¡Gracias! Hemos recibido sus datos.\n";

?> 
