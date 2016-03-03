  $(document).ready(function() {
      console.log('Connecting...');
      Server = new FancyWebSocket('ws://192.168.0.11:9300');


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
     $('#estado').html('');
        $('#parametros').parent().addClass('panel-success');
          

$('#estado').html('');

  if( res.temper >=12 || res.temper<=18){    
    if( res.humed <=75 ){    

        $('#estado').parent().addClass('panel-success');
        $('#estado').append("OOMICETO Y HONGOS");
        $('#estado').append(' <BR />');
        $('#estado').append(' <BR />');
        $('#estado').append("Phytophthora infestans Lancha negra, tizón tardío o gota ");
 
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
                
        $('#estado').append("Hongo Puccinía pittieriana “Roya”. ");
 
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
         
        $('#estado').append("PIE NEGRO O PUDRICIÓN BLANDA.     ");
 
  }      
}
  
 if( res.temper == 20){    
    

     $('#estado').append(' <BR />');
     $('#estado').append(' <BR />');
        $('#estado').parent().addClass('panel-success');
            // $('#estado').append("INSECTOS Y NEMATODOS ");
              //      $('#estado').append(' <BR />');

                //    $('#estado').append(' <BR />');
        $('#estado').append("Symmetrischema tangolias, Tecia solanivora, Phthorimaea operculella ADULTOS DE POLILLAS O MARIPOSAS  ");
 
  
}
  

       
 });


    //Administracion Consola
       
        $("#btnConectar").click(function(){
   //      if( res.cliente==="consola"){  
    

        var mensaje = {'origen':'php', 'destino':'consola','accion':'conectar', 'ventana':'uno'};
        Server.send('message', JSON.stringify(mensaje) );
          $('#tiempo').html('');
        $('#tiempo').parent().addClass('panel-success');
        $('#tiempo').append(i);  

  
     });

        $("#btnejecutar").click(function(){
  
            $('#txtconsola').html('');   
       var texto= $('#txtenvio').val();
        var mensaje = {'origen':'php', 'destino':'consola','ventana':'uno', 'comando':texto};
        Server.send('message', JSON.stringify(mensaje) );

         
     });


        $("#btnEnviar").click(function(){
  
            $('#txtconsola').html('');   
        var texto= $('#estado').text();


        var mensaje = {'origen':'php', 'destino':'consola','texto':texto};
        Server.send('message', JSON.stringify(mensaje) );

         
     });



/*
      function ventanaNueva(documento){ 
  window.open(documento,'nuevaVentana','width=300, height=400');
}

  $('#btnAbrir').append('<option  onclick="ventanaNueva('datos.html')"> </option>');
  */

      Server.connect();
});
