  $(document).ready(function() {
      console.log('Connecting...');
     Server = new FancyWebSocket('ws://212.231.132.41:9300');
     //  Server = new FancyWebSocket('ws://192.168.0.11:9300');


      //Let the user know we're connected
      Server.bind('open', function() {
        console.log( "Connected." );
    //  var mensaje = {'cliente':'php','ip':'192.168.1.106','datos':'05050','estado':'conexion','tiempo':'0.14'  };
      var mensaje = {'cliente':'php'};
        Server.send('message', JSON.stringify(mensaje) );

      });


      //OH NOES! Disconnection occurred.
      Server.bind('close', function( data ) {
     //   alert(data);

      
        console.log( "Disconnected." );
      });


      //console.log any messages sent from server
      Server.bind('message', function( payload ) {
        var res = jQuery.parseJSON(payload);
	
if(res.origen==="juanito") {
 $('#id_estacion').val(res.id_estacion);
    $('#lluvia').val(res.lluvia);
    $('#vviento').val(res.vel_viento);
    $('#dviento').val(res.dir_viento);
    $('#temperatura').val(res.temper);
    $('#presion').val(res.pres_atm);
    $('#fecha').val(hoy);
    $('#luz').val(res.luz);
    $('#humedad').val(res.humed);
    $('#parametros').parent().addClass('panel-success');
  
     


     //   if(typeof res!="null"){
     console.log(res);
//$('#id_estacion').val(res.id_estacion);
//    $('#lluvia').val(res.lluvia);
//    $('#vviento').val(res.vel_viento);
//    $('#dviento').val(res.dir_viento);
//    $('#temperatura').val(res.temper);
//    $('#presion').val(res.pres_atm);
//    $('#fecha').val(hoy);
//    $('#luz').val(res.luz);
//    $('#humedad').val(res.humed);
//    $('#parametros').parent().addClass('panel-success');
 //   $('#envio').html('');
       
     }

$('#envio').html('');
var hoy = new Date();
var dd = hoy.getDate();
var mm = hoy.getMonth()+1; //hoy es 0!
var yyyy = hoy.getFullYear();
if(dd<10) {
    dd='0'+dd
} 
$('#fecha').val(hoy);
if(mm<10) {
    mm='0'+mm
} 

hoy = mm+'/'+dd+'/'+yyyy;
// Muestra de datos desde arduino
//   $('#id_estacion').val(res.id_estacion);
 //   $('#lluvia').val(res.lluvia);
  //  $('#vviento').val(res.vel_viento);
 //   $('#dviento').val(res.dir_viento);
  //  $('#temperatura').val(res.temper);
   // $('#presion').val(res.pres_atm);
    //$('#fecha').val(hoy);
    //$('#luz').val(res.luz);
   // $('#humedad').val(res.humed);
   // $('#parametros').parent().addClass('panel-success');
   // $('#envio').html('');
          


  if( res.temper >=12 || res.temper<=18){    
    if( res.humed <=75 ){    

        $('#estado').parent().addClass('panel-success');
        $('#estado').append(' <BR />');
        $('#estado').append(' <BR />');
        $('#envio').append("-Lancha negra, tizon tardio o gota ");
        $('#estado').append("10.-Phytophthora infestans Lancha negra, tizón tardío o gota ");
 
  }      
}
     


       if( res.temper >=10 || res.temper<=14){    
    if( res.humed <=75 ){    
      $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
                
        $('#envio').append("-Roya ");
        $('#estado').append("12.- Hongo Puccinía pittieriana Roya");

 
  }      
}
     
       if( res.temper >=10 || res.temper<=14){    
    if( res.humed <=75 ){    
      $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
         
        $('#estado').append("2.2.- PIE NEGRO O PUDRICIÓN BLANDA.");
         $('#envio').append("-Pie Negro ");
 
  }      
}
  
 if( res.temper === 20){    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("40.- Symmetrischema tangolias, Tecia solanivora, Phthorimaea operculella ADULTOS DE POLILLAS O MARIPOSAS ");
         $('#envio').append("-Polillas o Mariposas ");
 
}


 if( res.luz === 0.01){    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("Cielo nocturno despejado, cuarto creciente o menguante");
        $('#envio').append("-Cielo nocturno despejado, cuarto creciente o menguante ");
 
}

 if( res.luz === 0.25){    
     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("Luna llena en una noche despejada");
          $('#envio').append("Luna llena en una noche despejada ");
 
  
}

 if( res.luz === 1){    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("Luna llena a gran altitud en latitudes tropicales");
        $('#envio').append("-Luna llena a gran altitud en latitudes tropicales ");
  
}



 if( res.luz === 3){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("Límite oscuro del crepúsculo bajo un cielo despejado");
        $('#envio').append("-Límite oscuro del crepúsculo bajo un cielo despejado ");
 
  
}


 if( res.luz === 32000){    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
        $('#estado').append("Luz solar en un día medio (mín.)");
         $('#envio').append("-Luz solar en un día medio (mín.) ");
  
}
 if( res.luz === 100000){    
     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
      $('#estado').append("Luz solar en un día medio (máx.)");
        $('#envio').append("-Luz solar en un día medio (máx.) ");

 
  
}

     var texto= $('#envio').text();

	if (texto.length>0){
        var mensaje = {'origen':'php', 'destino':'juanito','texto':texto};
        Server.send('message', JSON.stringify(mensaje) );
  }
        
   
 });



      Server.connect();
});
