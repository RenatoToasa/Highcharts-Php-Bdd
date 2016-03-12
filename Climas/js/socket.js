  $(document).ready(function() {
      console.log('Connecting...');
      Server = new FancyWebSocket('ws://212.231.132.41:9300');


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

        //console.log(res.origen);
        if(typeof res!="null"){
        console.log( res );
       
       
       
    }

var hoy = new Date();
var dd = hoy.getDate();
var mm = hoy.getMonth()+1; //hoy es 0!
var yyyy = hoy.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

hoy = mm+'/'+dd+'/'+yyyy;

// Muestra de datos desde arduino

    $('#id_estacion').val(res.id_estacion);
    $('#lluvia').val(res.lluvia);
    $('#vviento').val(res.vel_viento);
    $('#dviento').val(res.dir_viento);
    $('#temperatura').val(res.temper);
    $('#presion').val(res.pres_atm);
    $('#fecha').val(hoy);
    $('#luz').val(res.luz);
    $('#humedad').val(res.humed);
  //   $('#estado').html('');
        $('#parametros').parent().addClass('panel-success');
          

$('#estado').html('');

  if( res.temper >=12 || res.temper<=18){    
    if( res.humed <=75 ){    

        $('#estado').parent().addClass('panel-success');
 //       $('#estado').append("OOMICETO Y HONGOS");
        $('#estado').append(' <BR />');
        $('#estado').append(' <BR />');
        $('#estado').append("Phytophthora infestans Lancha negra, tizon tardio o gota ");
 
  }      
}
     


       if( res.temper >=10 || res.temper<=14){    
    if( res.humed <=75 ){    
      $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("OOMICETO Y HONGOS");
              //      $('#estado').append(' <BR />');
                //    $('#estado').append(' <BR />');
                
        $('#estado').append("Hongo Puccinia pittieriana “Roya”. ");
 
  }      
}
     
       if( res.temper >=10 || res.temper<=14){    
    if( res.humed <=75 ){    
      $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
             //$('#estado').append("BACTERIAS");
               //     $('#estado').append(' <BR />');
                 //   $('#estado').append(' <BR />');
         
        $('#estado').append("PIE NEGRO O PUDRICION BLANDA ");
 
  }      
}
  
 if( res.temper == 0,01){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Symmetrischema tangolias, Tecia solanivora, Phthorimaea operculella ADULTOS DE POLILLAS O MARIPOSAS");
 
  
}



 if( res.luz == 0.01){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Cielo nocturno despejado, cuarto creciente o menguante");
 
  
}


 if( res.luz == 0.25){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Luna llena en una noche despejada");
 
  
}


 if( res.luz == 1){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Luna llena a gran altitud en latitudes tropicales");
 
  
}



 if( res.luz == 3){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Límite oscuro del crepúsculo bajo un cielo despejado");
 
  
}


 if( res.luz == 32000){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Luz solar en un día medio (mín.)");
 
  
}


 if( res.luz == 100000){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Luz solar en un día medio (máx.)");
 
  
}










  
	
    $('#txtconsola').html('');   
        var texto= $('#estado').text();

	if (texto.length!=0){
        var mensaje = {'origen':'php', 'destino':'juanito','texto':texto};
        Server.send('message', JSON.stringify(mensaje) );
  }
        
 
  

   
 });


    //Administracion Consola
       


/*
      function ventanaNueva(documento){ 
  window.open(documento,'nuevaVentana','width=300, height=400');
}

  $('#btnAbrir').append('<option  onclick="ventanaNueva('datos.html')"> </option>');
  */

      Server.connect();
});
