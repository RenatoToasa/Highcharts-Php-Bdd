  $(document).ready(function() {
      console.log('Connecting...');
      Server = new FancyWebSocket('ws://192.168.0.27:9300');


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
      //console.log(res.resultado);


       if (payload!="null"){

        $('#consola').parent().addClass('panel-success');
           $('#consola').append(' <BR />');
        $('#consola').append(payload);
      
        }
        

       db = openDatabase('dndzgz', '1.0', 'DNDzgz', 65536);
 


       
 });
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
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



/*
      function ventanaNueva(documento){ 
  window.open(documento,'nuevaVentana','width=300, height=400');
}

  $('#btnAbrir').append('<option  onclick="ventanaNueva('datos.html')"> </option>');
  */

      Server.connect();
});
