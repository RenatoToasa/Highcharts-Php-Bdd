<table border="1" ><tr>
<td><font face="verdana"><b>Parametro</b></font></td>
<td><font face="verdana"><b>Valor</b></font></td>




</tr>

<?php  
  $link = @mysql_connect("localhost", "root","utafisei")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("datos", $link)
      or die ("Error al conectar a la base de datos.");



$query = "SELECT id_estacion, lluvia, vel_viento, dir_viento, temper, pres_atm,  fecha, luz, humed  FROM mediciones WHERE fecha = (select MAX(fecha) from mediciones)  ";





$result = mysql_query($query);

  $numero = 0;
    while ($row = mysql_fetch_row($result)){
echo "<tr>
              <td>Id Estacion</td>
              <td> </td>   </tr>  ";
echo "<tr>
              <td>Luvia</td>
              <td>". $row[1]."    </td>             
            </tr>";
echo "<tr>            
              <td>Velocidad de Viento </td>
              <td> ". $row[2]."  </td>       
            </tr>";
echo "<tr>
              <td>Dirección de Viento</td>
              <td>". $row[3]."               </td>              
            </tr>";

echo"<tr>
              <td>Temperatura</td>
              <td>   ". $row[4]."</td>              
            </tr>";
echo "<tr>
              <td>Presión Atmosferica</td>
              <td> ". $row[5]."   </td>              
            </tr>";

echo "<tr>
              <td>Fecha</td>
              <td>". $row[6]."     </td>              
            </tr>";

echo"   <tr>
              <td>Luz</td>
              <td>
                 ". $row[7]." 
              </td>
              
            </tr>";
echo "<tr>
              <td>Humedad</td>
              <td>
                 ". $row[8]." 
              </td>
              
            </tr>";
    $numero++;

     

    }


  
  mysql_free_result($result);
  mysql_close($link);
?>
</table>
