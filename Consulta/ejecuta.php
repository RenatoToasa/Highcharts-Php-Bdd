<?php
// http://programarenphp.wordpress.com


/******** CONECTAR CON BASE DE DATOS **************** */ 
/******** Recuerda cambiar por tus datos ***********/  
   $con = mysql_connect("localhost","root","hunterhacker");
   if (!$con){die('ERROR DE CONEXION CON MYSQL: ' . mysql_error());} 
/* ********************************************** */

/********* CONECTA CON LA BASE DE DATOS  **************** */
   $database = mysql_select_db("datos",$con);
   if (!$database){die('ERROR CONEXION CON BD: '.mysql_error());}
/* ********************************************** */
echo("llego");
//ejecutamos la consulta
$sql = "SELECT * FROM mediciones WHERE fecha >='"
      .$_POST['datepicker']."'";
$result = mysql_query ($sql);
  $numero = 0;

// verificamos que no haya error 
if (! $result){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
}else {



    echo  "<table border='1'><tr><td>Id_estacion</td><td>id_Sec</td><td>lluvia</td> <td>Id_estacion</td> <td>Vel_Viento</td> 
    <td>Dir_Viento</td>  <td>Temperatura</td> <td>Presion</td> <td>Fecha</td>     <td>luz</td>  <td>humed</td> </tr>;
         
//obtenemos los datos resultado de la consulta 
    while ($row = mysql_fetch_row($result)){
      echo "<tr><td width=\"25%\"><font face=\"verdana\">" . 
	    $row["id_estacion"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["id_sec"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["lluvia"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["vel_viento"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["dir_viento"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["temper"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["pres_atm"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["luz"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["humed"] . "</font></td></tr>";

    }
    echo "</table>";
 }


?>  
