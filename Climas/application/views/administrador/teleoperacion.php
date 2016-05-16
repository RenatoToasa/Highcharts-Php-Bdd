<!DOCTYPE html>
<html>
<head>
	<title>Climas</title>
	<script src="<?php echo site_url('js'); ?>/jquery-2.1.4.min.js"></script>
	<script src="<?php echo site_url('js'); ?>/jquery-2.1.4.min.js"></script>
	<script src="<?php echo site_url('js'); ?>/fancywebsocket.js"></script>
	<script src="<?php echo site_url('js'); ?>/socket.js"></script>
	<script src="<?php echo site_url('js'); ?>/bootstrap.js"></script>

    <!-- Bootstrap -->
    <link href="<?php echo site_url('css'); ?>/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="http://themes.getbootstrap.com/products/dashboard" >
	 <!-- Video -->
	<script src="<?php echo site_url('js'); ?>/firebase.js"></script>
	<script src="<?php echo site_url('js'); ?>/RTCPeerConnection-v1.5.js"></script>
	<script src="<?php echo site_url('js'); ?>/broadcast.js"></script>
	<script src="<?php echo site_url('js'); ?>/DetectRTC.js"></script>




<script language="JavaScript">

function ventanaNueva(documento){	
	window.open(documento,'nuevaVentana','width=500, height=500, top=200,left=400');
}

function ventanaNueva1(documento1){
        window.open(documento1,'nuevaVentana1');
}



</script>

</head>

<body background-color: #FFCC66;>



<br>
<div class="row text-center" >	
	<div class="panel panel-default" >
			<div class="panel-heading" style="background:#133A3A">

			
			<img src="http://212.231.131.127/Climas/img/38_logos-11.jpg" align="right"  width="260" height="100">
			<img src="http://212.231.131.127/Climas/img/banderin.png" align="left"  width="100" height="110">
			<br>
			<br>
				<h2 span style="color:#FCFAFA"><b>Universidad Técnica de Ambato</b></h2>
				
				
				<h3 span style="color:#FCFAFA" ><b>Facultad de Ingeniería en Sistemas, Electronica e Industrial</b></h3>

				<h4 span style="color:#FCFAFA" >SISTEMA DE MONITOREO AGRÍCOLA CON TECNOLOGÍA INALÁMBRICA PARA LA PREVENCIÓN TEMPRANA DE PLAGAS, ENFERMEDADES Y
ALERTAS EN EL CULTIVO DE PAPA EN LA PARROQUIA QUIMIAG DEL
CANTÓN RIOBAMBA DE LA PROVINCIA DE CHIMBORAZO.”</h4>

<br>
<br>
		<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						 	Paramétros 
					</div>
					<div class="panel-body" id='parametros' style="height:550px;border:1px solid #ccc;font:16px/26px ;overflow:auto;">	
<h4>Útimos datos Registrados</h4>
<br>
<table border="2"><tr>
<td><font face="verdana"><b>Parámetro</b></font></td>
<td><font face="verdana"><b>Valor</b></font></td>




</tr>

<?php  
$url1=$_SERVER['REQUEST_URI'];	 

	header("Refresh: 15; URL=$url1");

  $link = @mysql_connect("localhost", "root","hunterhacker")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("datos", $link)
      or die ("Error al conectar a la base de datos.");



$query = "SELECT id_estacion, lluvia, vel_viento, dir_viento, temper, pres_atm,  fecha, luz, humed, Temper_th  FROM mediciones WHERE fecha = (select MAX(fecha) from mediciones)  ";





$result = mysql_query($query);

  $numero = 0;
    while ($row = mysql_fetch_row($result)){
echo "<tr>
              <td>Id Estación</td>
              <td>".$row[0]."  </td>   </tr>  ";
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

 echo "<tr>
              <td>Termómetro Húmedo</td>
              <td>
                 ". $row[9]." 
              </td>
              
            </tr>";     
    

     

    }

  
  mysql_free_result($result);
  mysql_close($link);
?>
</table>
<br>
<h4>Temperatura minima aproximada de mañana</h4>
<br>
<!-- CONSULTA PREDICCION-->


<table border="2"><tr>
<td><font face="verdana"><b>Parámetro</b></font></td>
<td><font face="verdana"><b>Porcentaje</b></font></td>




</tr>

<?php  
$url1=$_SERVER['REQUEST_URI'];	 

	header("Refresh:15; URL=$url1");

  $link = @mysql_connect("localhost", "root","hunterhacker")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("datos", $link)
      or die ("Error al conectar a la base de datos.");



$query = "SELECT prediccion  FROM prediccion WHERE fecha = (select MAX(fecha) from prediccion)  ";





$result = mysql_query($query);

  $numero = 0;
    while ($row = mysql_fetch_row($result)){
echo "<tr>
              <td>Prediccion Temperatura</td>
              <td>".$row[0]."  </td>   </tr>  ";
    

     

    }

  
  mysql_free_result($result);
  mysql_close($link);
?>


</table>



<!-- FIN CONSULTA PREDICCION-->

					
					</div>	
									
						
						
				</div>
			</div>


<div class="row">
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
												Datos Obtenidos por el INIAP Y MAGAP
					
						</div>
						<div class="panel-body" id='estado' name = 'estado' style="height:550px;border:1px solid #ccc;font:16px/26px ;overflow:auto;">	

						<h4>OMICETO Y HONGOS	</h4>						
<strong>10.- Phytophthora infestans "Lancha negra, tizón tardío o gota"</strong>
<P align="left"> <strong>TEMPERATURA:</strong> 	12 ºC min 	18ºC max	</p>


<P align="left"> <strong>HUMEDAD RELATIVA:</strong> 	75%		</p>
<P align="left"> <strong>TIEMPO DE DESARROLLO:</strong>	De 2 a 5 dias para el desarrollo de la plaga y 7 dias para presentar sintomas	</p>
<P align="left"> <strong>HUMEDAD RELATIVA:</strong>	75%		</p>
<P align="left"> <strong>ESTADO DEL DIA:</strong>	Con presencia de luz solar		</p>



<br>


<strong>					12.- Hongo Puccinía pittieriana “Roya”.</strong>


<P align="left"> <strong>TEMPERATURA:</strong> 	10º C min 	14º C max	</p>


<P align="left"> <strong>HUMEDAD RELATIVA:</strong> 	75%		</p>
<P align="left"> <strong>TIEMPO DE DESARROLLO:</strong>	12 a mas horas continuas de humedad </p>
<P align="left"> <strong>HUMEDAD RELATIVA:</strong>	75%		</p>
<P align="left"> <strong>ESTADO DEL DIA:</strong>	Sin sol		</p>

<br>

			<h4>BACTERIAS	</h4>	
<strong>2.2.- Pie negro o pudrición blanda.</strong>
<P align="left"> <strong>TEMPERATURA:</strong> 	10º C min 	14º C max	</p>
<P align="left"> <strong>HUMEDAD RELATIVA:</strong> 	75%		</p>
<P align="left"> <strong>TIEMPO DE DESARROLLO:</strong>	12 a mas horas continuas de humedad </p>
<P align="left"> <strong>ESTADO DEL DIA:</strong>	Sin sol		</p>

<br>	

<h4>INSECTOS Y NEMÁTODOS	</h4>	
<strong>40.- Symmetrischema tangolias, Tecia solanivora, Phthorimaea operculella ADULTOS DE POLILLAS O MARIPOSAS</strong>
<P align="left"> <strong>TEMPERATURA:</strong> 	20° C </p>
<P align="left"> <strong>HUMEDAD RELATIVA:</strong> 	Baja	</p>
<P align="left"> <strong>TIEMPO DE DESARROLLO:</strong>	Varia según el sector</p>
<P align="left"> <strong>ESTADO DEL DIA:</strong>	Poco sol		</p>


						</div>
				
					</div>
				</div>






<div class="row">
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							Consulta de Registros

				
					
						</div>
						<div class="panel-body" id='estado' name = 'estado' style="height:325px;border:1px solid #ccc;font:16px/26px ;overflow:auto;">

							<object data="http://212.231.131.127/Consulta/index.html" width="400" height="300">     <embed wmode="transparent" src="http://212.231.131.127/Consulta/index.html" width="400" height="300" /> Error: Embedded data could not be displayed. </object>										
										
						</div>
				
					</div>
				</div>




<br>
<br>



<div class="row" >
				<div class="col-lg-4"  >
					<div class="panel panel-default"  >
						<div class="panel-heading"  >
							Gráficas y Consulta de Registros
							
					
						</div>
						<div class="panel-body" id='grafica' name = 'grafica' >	
						<table>
                                                        <tr>
                                                                <td>    <input type="button" id ='btnAbrir' value="Temperatura" onclick="ventanaNueva('/test/temperatura.php')" /></td>
                                                                <td><input type="button" id ='btnAbrir' value="Gráfica Humedad" onclick="ventanaNueva('/test/humedad.php')" /></td>
                                                                
                                                                
                                                        </tr>
							<tr>
							<td><br></td>
							</tr>
							<tr>
								 <td><input type="button" id ='btnAbrir' value="Gráfica Luz" onclick="ventanaNueva('/test/luz.php')" /></td>
								 <td>    <input type="button" id ='btnAbrir' value=" Temperatura Mínima" onclick="ventanaNueva('/test/temp_min.php')" /></td>
							</tr>
                                                        <tr>
                                                                <td><br></td>
                                                        </tr>

                                                        <tr>
								
                                                                <td><input type="button" id ='btnAbrir' value="Termómetro Húmedo" onclick="ventanaNueva('/test/th.php')" /></td>
                                                                
                                                        </tr>
                                                        </table>

				
										
						</div>
				
					</div>
				</div>


<div class="row" style='display:none;' >
				<div class="col-lg-5"  >
					<div class="panel panel-default"  >
						<div class="panel-heading"  >
							Resultados enviados

				
					
						</div>
						<div class="panel-body" id='envio' name = 'envio' >	

				
										
						</div>
				
					</div>
				</div>



	
	
		
			
			




		</div>
	</div>
</div>








<br>
<br>
<br>


		</div>
	</div>
</div>

</body>
</html>
