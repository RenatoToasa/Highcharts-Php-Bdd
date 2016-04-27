<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<td><font face="verdana"><b>Id Estacion</b></font></td>
<td><font face="verdana"><b>Id Secuencial</b></font></td>
<td><font face="verdana"><b>Lluvia</b></font></td>
<td><font face="verdana"><b>Vel Viento</b></font></td>
<td><font face="verdana"><b>Dir_Viento</b></font></td>
<td><font face="verdana"><b>Temperatura</b></font></td>
<td><font face="verdana"><b>Presion</b></font></td>
<td><font face="verdana"><b>Fecha</b></font></td>
<td><font face="verdana"><b>Luz</b></font></td>
<td><font face="verdana"><b>Humedad</b></font></td>



</tr>

<?php  
  $link = @mysql_connect("localhost", "root","utafisei")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("datos", $link)
      or die ("Error al conectar a la base de datos.");




$query = "SELECT id_estacion, id_sec, lluvia, vel_viento, dir_viento, temper, pres_atm,  fecha, luz, humed  FROM mediciones WHERE fecha between '"
      .$_POST['datepicker'].":00:00:00' and '".$_POST['datepicker'].":23:59:59'   ";



$result = mysql_query($query);

  $numero = 0;
    while ($row = mysql_fetch_row($result)){
echo "<tr><td width=\"5%\"><font face=\"verdana\">" . 
	    $row[0] . "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" . 
	    $row[1] . "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" . 
	    $row[2] . "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" . 
	    $row[3]. "</font></td>";    
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[4]. "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[5]. "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[6]. "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[7]. "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[8]. "</font></td>";
    echo "<td width=\"5%\"><font face=\"verdana\">" .
            $row[9]. "</font></td></tr>";


    $numero++;

     

    }

  echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de Registros: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  mysql_close($link);
?>
</table>
