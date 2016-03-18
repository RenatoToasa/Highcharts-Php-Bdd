<?php
// http://programarenphp.wordpress.com


/******** CONECTAR CON BASE DE DATOS **************** */ 
/******** Recuerda cambiar por tus datos ***********/  
   $con = mysql_connect("localhost","root","utafisei");
   if (!$con){die('ERROR DE CONEXION CON MYSQL: ' . mysql_error());} 
/* ********************************************** */

/********* CONECTA CON LA BASE DE DATOS  **************** */
   $database = mysql_select_db("datos",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
/* ********************************************** */
echo("llego");
//ejecutamos la consulta
$sql = "SELECT * FROM mediciones WHERE fecha='"
      .$_POST['datepicker']."'";
$result = mysql_query ($sql);
// verificamos que no haya error 
if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {
    echo "<table border='1'><tr><td>Nombre</td><td>Precio</td><td>Existencia</td>
         </tr><tr>";
//obtenemos los datos resultado de la consulta 
    while ($row = mysql_fetch_row($result)){
  echo "<td>".$row[0]."</td><td>".$row[1]."</td>
              <td>".$row[2]."</td>";
    }
    echo "</tr></table>";
 }
?>  